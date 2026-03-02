<?php

namespace App\Imports;

use App\Models\PersonalInformation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PersonalInformationImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row['employee_id'])) return null;

        $dob = is_numeric($row['date_of_birth'])
        ? Date::excelToDateTimeObject($row['date_of_birth'])->format('Y-m-d')
        : $row['date_of_birth'];

        return new PersonalInformation([
            'employee_id' => $row['employee_id'],
            'surname' => $row['surname'],
            'first_name' => $row['first_name'],
            'middle_name' => $row['middle_name'],
            'extension' => $row['extension'],
            'date_of_birth' => $dob,
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
}