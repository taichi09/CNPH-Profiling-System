<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PdsOcrController extends Controller
{
    public function index()
    {
        return view('pds');
    }

    public function extract(Request $request)
    {
        $request->validate([
            'pds_image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
        ]);

        $imageContent = base64_encode(
            file_get_contents($request->file('pds_image')->getRealPath())
        );

        $apiKey = config('services.google_vision.api_key');
        $apiUrl = "https://vision.googleapis.com/v1/images:annotate?key={$apiKey}";

        $response = Http::withOptions([
            'verify' => false, // Replace false with path to cacert.pem in production
        ])->post($apiUrl, [
            'requests' => [[
                'image'    => ['content' => $imageContent],
                'features' => [['type' => 'DOCUMENT_TEXT_DETECTION', 'maxResults' => 1]],
            ]],
        ]);

        if ($response->failed()) {
            return back()->withErrors(['api' => 'Google Vision API request failed: ' . $response->body()]);
        }

        $fullText = $response->json('responses.0.fullTextAnnotation.text', '');

        if (empty($fullText)) {
            return back()->withErrors(['api' => 'No text detected in the image.']);
        }

        $extracted = $this->parsePersonalInfo($fullText);

        return view('result', compact('extracted', 'fullText'));
    }

    // -------------------------------------------------------------------------
    // PARSER
    // -------------------------------------------------------------------------

    /**
     * Parse raw OCR text from CS Form 212 (Revised 2025).
     *
     * Key insight: Google Vision reads the form left-to-right, top-to-bottom,
     * so labels ("SURNAME", "FIRST NAME") appear BEFORE their values in the
     * text stream. We locate each label line, then scan forward for the first
     * line that does NOT look like a form label — that is the value.
     */
    private function parsePersonalInfo(string $text): array
    {
        $lines = array_values(array_filter(
            array_map('trim', explode("\n", $text)),
            fn($l) => $l !== ''
        ));

        return [
            // Personal info
            'surname'            => $this->valueAfterLabel($lines, ['SURNAME']),
            'first_name'         => $this->valueAfterLabel($lines, ['FIRST NAME', 'FIRSTNAME']),
            'middle_name'        => $this->valueAfterLabel($lines, ['MIDDLE NAME', 'MIDDLENAME']),
            'name_extension'     => $this->valueAfterLabel($lines, ['NAME EXTENSION']),
            'date_of_birth'      => $this->valueAfterLabel($lines, ['DATE OF BIRTH']),
            'place_of_birth'     => $this->valueAfterLabel($lines, ['PLACE OF BIRTH']),
            'sex'                => $this->detectSex($text),
            'civil_status'       => $this->detectCivilStatus($text, $lines),
            'citizenship'        => $this->detectCitizenship($text),
            'height'             => $this->valueAfterLabel($lines, ['HEIGHT (m)', 'HEIGHT']),
            'weight'             => $this->valueAfterLabel($lines, ['WEIGHT (kg)', 'WEIGHT']),
            'blood_type'         => $this->valueAfterLabel($lines, ['BLOOD TYPE']),

            // Government IDs
            'gsis_id'            => $this->valueAfterLabel($lines, ['GSIS ID NO', 'GSIS']),
            'pagibig_id'         => $this->valueAfterLabel($lines, ['PAG-IBIG ID NO', 'PAG-IBIG']),
            'philhealth'         => $this->valueAfterLabel($lines, ['PHILHEALTH NO', 'PHILHEALTH']),
            'philsys'            => $this->valueAfterLabel($lines, ['PhilSys Number', 'PHILSYS']),
            'tin'                => $this->valueAfterLabel($lines, ['TIN NO', 'TIN NO.']),
            'umid'               => $this->valueAfterLabel($lines, ['UMID ID NO', 'UMID']),
            'agency_employee_no' => $this->valueAfterLabel($lines, ['AGENCY EMPLOYEE NO']),
            'sss'                => $this->valueAfterLabel($lines, ['SSS']),

            // Contact
            'telephone'          => $this->valueAfterLabel($lines, ['TELEPHONE NO']),
            'mobile'             => $this->valueAfterLabel($lines, ['MOBILE NO']),
            'email'              => $this->extractEmail($text),

            // Address
            'residential_address' => $this->buildAddress($text, 'RESIDENTIAL'),
            'permanent_address'   => $this->buildAddress($text, 'PERMANENT'),
            'zip_code'            => $this->extractPattern($text, '/ZIP\s*CODE\s*\n([0-9]{4,5})/i'),

            // Family background
            'spouse_surname'     => $this->valueAfterLabel($lines, ["SPOUSE'S SURNAME", 'SPOUSE SURNAME']),
            'spouse_firstname'   => $this->valueAfterSectionLabel($lines, 'SPOUSE', 'FIRST NAME'),
            'father_surname'     => $this->valueAfterLabel($lines, ["FATHER'S SURNAME", 'FATHER SURNAME']),
            'father_firstname'   => $this->valueAfterSectionLabel($lines, "FATHER'S SURNAME", 'FIRST NAME'),
            'father_extension'   => $this->valueAfterSectionLabel($lines, "FATHER'S SURNAME", 'NAME EXTENSION'),
            'mother_surname'     => $this->valueAfterSectionLabel($lines, "MOTHER'S MAIDEN", 'SURNAME'),
            'mother_firstname'   => $this->valueAfterSectionLabel($lines, "MOTHER'S MAIDEN", 'FIRST NAME'),
            'mother_middlename'  => $this->valueAfterSectionLabel($lines, "MOTHER'S MAIDEN", 'MIDDLE NAME'),
        ];
    }

    /**
     * Find the first occurrence of any label, then return the next
     * non-label line as the value.
     */
    private function valueAfterLabel(array $lines, array $labels, int $maxScan = 8): ?string
    {
        foreach ($lines as $i => $line) {
            foreach ($labels as $label) {
                if (stripos($line, $label) !== false) {
                    // Check if value is inline on the same line
                    $remainder = trim(preg_replace('/^.*?' . preg_quote($label, '/') . '\s*/i', '', $line));
                    if ($remainder !== '' && $remainder !== $line && !$this->isLabel($remainder)) {
                        return $remainder;
                    }

                    // Scan forward for next non-label line
                    for ($j = $i + 1; $j < min($i + $maxScan, count($lines)); $j++) {
                        if (!$this->isLabel($lines[$j])) {
                            return $lines[$j];
                        }
                    }
                }
            }
        }
        return null;
    }

    /**
     * Within the block starting at $sectionLabel, find the value after $fieldLabel.
     * Handles repeated field names (e.g. multiple "FIRST NAME" rows in the form).
     */
    private function valueAfterSectionLabel(array $lines, string $sectionLabel, string $fieldLabel): ?string
    {
        $sectionIdx = null;
        foreach ($lines as $i => $line) {
            if (stripos($line, $sectionLabel) !== false) {
                $sectionIdx = $i;
                break;
            }
        }
        if ($sectionIdx === null) return null;

        $subset = array_slice($lines, $sectionIdx + 1, 20, true);
        foreach ($subset as $i => $line) {
            if (stripos($line, $fieldLabel) !== false) {
                for ($j = $i + 1; $j < min($i + 6, count($lines)); $j++) {
                    if (isset($lines[$j]) && !$this->isLabel($lines[$j])) {
                        return $lines[$j];
                    }
                }
            }
        }
        return null;
    }

    /**
     * Decide whether a line is a CS Form 212 label (not a data value).
     *
     * We intentionally do NOT flag short uppercase words like "ANGELES" as
     * labels — the keyword list below only contains actual form field phrases.
     */
    private function isLabel(string $line): bool
    {
        static $keywords = [
            'SURNAME', 'FIRST NAME', 'MIDDLE NAME', 'DATE OF BIRTH', 'PLACE OF BIRTH',
            'SEX AT BIRTH', 'CIVIL STATUS', 'HEIGHT', 'WEIGHT', 'BLOOD TYPE',
            'CITIZENSHIP', 'RESIDENTIAL ADDRESS', 'PERMANENT ADDRESS', 'ZIP CODE',
            'TELEPHONE NO', 'MOBILE NO', 'E-MAIL', 'GSIS', 'PAG-IBIG', 'PHILHEALTH',
            'PhilSys', 'TIN NO', 'UMID', 'AGENCY EMPLOYEE', 'SSS',
            "SPOUSE'S SURNAME", "FATHER'S SURNAME", "MOTHER'S MAIDEN",
            'OCCUPATION', 'EMPLOYER', 'BUSINESS ADDRESS', 'BUSINESS NAME',
            'NAME EXTENSION', 'NAME OF CHILDREN',
            'PERSONAL INFORMATION', 'FAMILY BACKGROUND', 'EDUCATIONAL BACKGROUND',
            'LEVEL', 'NAME OF SCHOOL', 'BASIC EDUCATION', 'PERIOD OF ATTENDANCE',
            'HIGHEST LEVEL', 'YEAR GRADUATED', 'SCHOLARSHIP', 'HONORS RECEIVED',
            'ELEMENTARY', 'SECONDARY', 'VOCATIONAL', 'COLLEGE', 'GRADUATE STUDIES',
            'SIGNATURE', 'WARNING', 'READ THE ATTACHED', 'PRINT LEGIBLY',
            'CS FORM', 'REVISED', 'PERSONAL DATA SHEET',
            'House/Block', 'Subdivision/Village', 'City/Municipality',
            'Province', 'Barangay', 'Street',
            'by birth', 'by naturalization', 'indicate country',
            'If holder', 'please indicate', 'Tick appropriate',
            'Indicate N/A', 'DO NOT ABBREVIATE',
            'Write in full', 'Write full name',
            'Continue on separate',
        ];

        foreach ($keywords as $kw) {
            if (stripos($line, $kw) !== false) return true;
        }

        // Numbered form items: "1. SURNAME", "17. RESIDENTIAL ADDRESS"
        if (preg_match('/^\d+\.\s+[A-Z]/', $line)) return true;

        // Lines made up only of checkbox symbols
        if (preg_match('/^[\[\]✓☑☐✔\s]+$/', $line)) return true;

        return false;
    }

    // -------------------------------------------------------------------------
    // Specialised detectors
    // -------------------------------------------------------------------------

    private function detectSex(string $text): ?string
    {
        if (preg_match('/[✓☑✔]\s*Female/u', $text) || preg_match('/Female\s*[✓☑✔]/u', $text)) return 'Female';
        if (preg_match('/[✓☑✔]\s*Male/u', $text)   || preg_match('/Male\s*[✓☑✔]/u', $text))   return 'Male';
        return null;
    }

    private function detectCivilStatus(string $text, array $lines): ?string
    {
        $statuses = ['Single', 'Married', 'Widowed', 'Separated'];
        foreach ($statuses as $status) {
            if (preg_match('/[✓☑✔]\s*' . $status . '/u', $text)) return $status;
        }
        // Fallback: look for status words near the CIVIL STATUS label
        foreach ($lines as $i => $line) {
            if (stripos($line, 'CIVIL STATUS') !== false) {
                $nearby = implode(' ', array_slice($lines, $i, 6));
                foreach ($statuses as $status) {
                    if (stripos($nearby, $status) !== false) return $status;
                }
            }
        }
        return null;
    }

    private function detectCitizenship(string $text): ?string
    {
        if (preg_match('/[✓☑✔]\s*Filipino/u', $text) || preg_match('/Filipino\s*[✓☑✔]/u', $text)) return 'Filipino';
        if (preg_match('/Dual Citizenship/i', $text)) return 'Dual Citizenship';
        return null;
    }

    private function buildAddress(string $text, string $type): ?string
    {
        if (!preg_match("/{$type}\s+ADDRESS.*?\n(.*?)(?=ZIP\s*CODE|\d+\.\s+[A-Z]|II\.|III\.|\z)/is", $text, $block)) {
            return null;
        }

        $chunk  = $block[1];
        $parts  = [];

        $subPatterns = [
            '/(?:House\/Block\/Lot No\.?)\s*\n([^\n]+)/i',
            '/(?:Street)\s*\n([^\n]+)/i',
            '/(?:Subdivision\/Village|Barangay)\s*\n([^\n]+)/i',
            '/(?:City\/Municipality)\s*\n([^\n]+)/i',
            '/(?:Province)\s*\n([^\n]+)/i',
        ];

        foreach ($subPatterns as $pat) {
            if (preg_match($pat, $chunk, $m) && trim($m[1]) !== 'N/A') {
                $parts[] = trim($m[1]);
            }
        }

        if (preg_match('/\bPUROK\s+\d+/i', $chunk, $m)) {
            array_unshift($parts, $m[0]);
        }

        return !empty($parts) ? implode(', ', array_unique($parts)) : null;
    }

    private function extractEmail(string $text): ?string
    {
        if (preg_match('/[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}/', $text, $m)) {
            return $m[0];
        }
        return null;
    }

    private function extractPattern(string $text, string $pattern): ?string
    {
        if (preg_match($pattern, $text, $m)) {
            return trim($m[1]);
        }
        return null;
    }
}