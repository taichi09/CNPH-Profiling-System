<?php

namespace App\Imports;

use App\Models\FamilyBackground;

class FamilyBackgroundImport extends SkippableImport
{
    public function model(array $row)
    {
        if (empty($row['employee_id'])) return null;
        if ($this->isDuplicate($row)) return null;

        return new FamilyBackground([
            'employee_id' => $row['employee_id'],
            'spouse_surname' => $row['spouse_surname'],
            'spouse_first_name' => $row['spouse_first_name'],
            'spouse_middle_name' => $row['spouse_middle_name'],
            'spouse_name_extension' => $row['spouse_name_extension'],
            'occupation' => $row['occupation'],
            'employer_business_name' => $row['employer_business_name'],
            'business_address' => $row['business_address'],
            'telephone_no' => $row['telephone_no'],
            'name_of_children' => $row['name_of_children'],
            'date_of_birth' => $row['date_of_birth'],
            'father_surname' => $row['father_surname'],
            'father_first_name' => $row['father_first_name'],
            'father_middle_name' => $row['father_middle_name'],
            'father_name_extension' => $row['father_name_extension'],
            'mother_surname' => $row['mother_surname'],
            'mother_first_name' => $row['mother_first_name'],
            'mother_middle_name' => $row['mother_middle_name'],
        ]);
    }
}