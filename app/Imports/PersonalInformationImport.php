<?php

namespace App\Imports;

use App\Models\PersonalInformation;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class PersonalInformationImport implements ToCollection, WithHeadingRow
{
    /**
     * Excel employee_ids confirmed as duplicates via name+DOB DB lookup.
     * Other sheets check this list — if their employee_id is here, skip.
     */
    protected array $skipIds = [];

    public function getSkipIds(): array
    {
        return $this->skipIds;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (empty($row['employee_id'])) continue;

            $excelId = trim($row['employee_id']);
            $surname = trim($row['surname'] ?? '');
            $firstName = trim($row['first_name'] ?? '');
            $middleName = trim($row['middle_name'] ?? '');
            $dob = $this->parseDate($row['date_of_birth'] ?? null);

            $query = PersonalInformation::whereRaw('LOWER(TRIM(surname)) = ?', [strtolower($surname)])
                ->whereRaw('LOWER(TRIM(first_name)) = ?', [strtolower($firstName)])
                ->whereRaw('LOWER(TRIM(middle_name)) = ?', [strtolower($middleName)]);

            if ($dob) {
                $query->whereDate('date_of_birth', $dob);
            }

            $exists = $query->exists();

            if ($exists) {
                $this->skipIds[] = $excelId;
                continue; // ← skip, no ID wasted
            }

            // ← Only fires when row is truly new, ID allocated here only
            PersonalInformation::create([
                'employee_id' => $excelId,
                'surname' => $surname,
                'first_name' => $firstName,
                'middle_name' => $middleName,
                'extension' => $row['extension'] ?? null,
                'date_of_birth' => $dob,
                'place_of_birth' => $row['place_of_birth'] ?? null,
                'sex_at_birth' => $row['sex_at_birth'] ?? null,
                'civil_status' => $row['civil_status'] ?? null,
                'height' => $row['height'] ?? null,
                'weight' => $row['weight'] ?? null,
                'blood_type' => $row['blood_type'] ?? null,
                'umid_id_no' => $row['umid_id_no'] ?? null,
                'pagibig_id_no' => $row['pagibig_id_no'] ?? null,
                'philhealth_id_no' => $row['philhealth_id_no'] ?? null,
                'philsys_no' => $row['philsys_no'] ?? null,
                'tin_no' => $row['tin_no'] ?? null,
                'agency_employee_no' => $row['agency_employee_no'] ?? null,
                'citizenship' => $row['citizenship'] ?? null,
                'residential_address' => $row['residential_address'] ?? null,
                'residential_zip_code' => $row['residential_zip_code'] ?? null,
                'permanent_address' => $row['permanent_address'] ?? null,
                'permanent_zip_code' => $row['permanent_zip_code'] ?? null,
                'telephone_no' => $row['telephone_no'] ?? null,
                'mobile_no' => $row['mobile_no'] ?? null,
                'email_address' => $row['email_address'] ?? null,
            ]);
        }
    }

    private function parseDate($value): ?string
    {
        if (empty($value)) return null;

        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value)->format('Y-m-d');
        }

        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
            return $value;
        }

        if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $value, $matches)) {
            try {
                return ((int) $matches[1] > 12)
                    ? Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d')
                    : Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
            } catch (\Exception $e) {
                return null;
            }
        }

        try {
            return Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}