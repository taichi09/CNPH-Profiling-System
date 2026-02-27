<?php

namespace App\Imports;

use App\Models\OtherInformation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OtherInformationImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new OtherInformation([
            'employee_id' => $row['employee_id'] ?? null,
            'special_skills_and_hobbies' => $row['special_skills_and_hobbies'] ?? null,
            'non_academic_distinction' => $row['non_academic_distinction'] ?? null,
            'membership_in_association'  => $row['membership_in_association'] ?? null,
        ]);
    }
}