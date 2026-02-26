<?php

namespace App\Imports;

use App\Models\PersonalInformation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;

class EmployeesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new PersonalInformation([
            'surname' => $row['surname'] ?? null,
            'first_name' => $row['first_name'] ?? null,
            'middle_name' => $row['middle_name'] ?? null,
            'extension' => $row['extension'] ?? null,
            'date_of_birth' => isset($row['date_of_birth']) ? (is_numeric($row['date_of_birth']) ? ExcelDate::excelToDateTimeObject($row['date_of_birth'])
            ->format('Y-m-d') : Carbon::parse($row['date_of_birth'])->format('Y-m-d')) : null,
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