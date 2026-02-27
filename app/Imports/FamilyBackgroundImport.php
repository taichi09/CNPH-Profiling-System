<?php

namespace App\Imports;

use App\Models\FamilyBackground;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FamilyBackgroundImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new FamilyBackground([
            'employee_id' => $row['employee_id'] ?? null,
            'spouse_surname' => $row['spouse_surname'] ?? null,
            'spouse_first_name' => $row['spouse_first_name'] ?? null,
            'spouse_middle_name' => $row['spouse_middle_name'] ?? null,
            'spouse_name_extension' => $row['spouse_name_extension'] ?? null,
            'occupation' => $row['occupation'] ?? null,
            'employer_business_name' => $row['employer_business_name'] ?? null,
            'business_address' => $row['business_address'] ?? null,
            'telephone_no' => $row['telephone_no'] ?? null,
            'name_of_children' => $row['name_of_children'] ?? null,
            'date_of_birth' => $row['date_of_birth'] ?? null,
            'father_surname' => $row['father_surname'] ?? null,
            'father_first_name' => $row['father_first_name'] ?? null,
            'father_middle_name' => $row['father_middle_name'] ?? null,
            'father_name_extension' => $row['father_name_extension'] ?? null,
            'mother_maiden_name' => $row['mother_maiden_name'] ?? null,
            'mother_surname' => $row['mother_surname'] ?? null,
            'mother_first_name' => $row['mother_first_name'] ?? null,
            'mother_middle_name' => $row['mother_middle_name'] ?? null,
        ]);
    }
}