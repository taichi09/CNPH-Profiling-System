<?php

namespace App\Imports;

use App\Models\OtherInformation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OtherInformationImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row['employee_id'])) return null;

        return new OtherInformation([
            'employee_id' => $row['employee_id'],
            'special_skills_and_hobbies' => $row['special_skills_and_hobbies'] ?? null,
            'non_academic_distinction' => $row['non_academic_distinction'] ?? null,
            'membership_in_association' => $row['membership_in_association'] ?? null,
            'landbank_no' => $row['landbank_no'] ?? null,
            'dbp_no' => $row['dbp_no'] ?? null,
            'sss_id' => $row['sss_id'] ?? null,
            'department_name' => $row['department_name'] ?? null,
            'employment_status' => $row['employment_status'] ?? null,
        ]);
    }
}