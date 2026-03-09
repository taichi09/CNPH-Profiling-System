<?php

namespace App\Imports;

use App\Models\PersonalInformation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class PersonalInformationImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row['employee_id'])) return null;

        return new PersonalInformation([
            'employee_id' => $row['employee_id'],
            'surname' => $row['surname'],
            'first_name' => $row['first_name'],
            'middle_name' => $row['middle_name'],
            'extension' => $row['extension'],
            'date_of_birth' => $this->parseDate($row['date_of_birth']),
            'place_of_birth' => $row['place_of_birth'],
            'sex_at_birth' => $row['sex_at_birth'],
            'civil_status' => $row['civil_status'],
            'height' => $row['height'],
            'weight' => $row['weight'],
            'blood_type' => $row['blood_type'],
            'umid_id_no' => $row['umid_id_no'],
            'pagibig_id_no' => $row['pagibig_id_no'],
            'philhealth_id_no' => $row['philhealth_id_no'],
            'philsys_no' => $row['philsys_no'],
            'tin_no' => $row['tin_no'],
            'agency_employee_no' => $row['agency_employee_no'],
            'citizenship' => $row['citizenship'],
            'residential_address' => $row['residential_address'],
            'residential_zip_code' => $row['residential_zip_code'],
            'permanent_address' => $row['permanent_address'],
            'permanent_zip_code' => $row['permanent_zip_code'],
            'telephone_no' => $row['telephone_no'],
            'mobile_no' => $row['mobile_no'],
            'email_address' => $row['email_address'],
        ]);
    }

    private function parseDate($value): ?string
    {
        if (empty($value)) return null;

        // Case 1 — Excel serial number (e.g. 45678)
        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value)->format('Y-m-d');
        }

        // Case 2 — already Y-m-d format (e.g. 1961-07-03)
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
            return $value;
        }

        // Case 3 — mm/dd/yyyy or dd/mm/yyyy (e.g. 03/07/1961)
        if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $value, $matches)) {
            $first  = (int) $matches[1];
            $second = (int) $matches[2];
            $year   = $matches[3];

            // If first part is > 12, it must be dd/mm/yyyy
            // because months only go up to 12
            if ($first > 12) {
                // dd/mm/yyyy → Y-m-d
                return Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
            }

            // Otherwise assume mm/dd/yyyy (your default Excel format)
            return Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
        }

        // Case 4 — fallback, let Carbon try to parse it
        try {
            return Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}