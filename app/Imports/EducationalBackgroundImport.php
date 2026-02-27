<?php

namespace App\Imports;

use App\Models\EducationalBackground;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EducationalBackgroundImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new EducationalBackground([
            'employee_id' => $row['employee_id'] ?? null,
            'level' => $row['level'] ?? null,
            'name_of_school' => $row['name_of_school'] ?? null,
            'basic_education' => $row['basic_education'] ?? null,
            'period_of_attendance_from' => $row['period_of_attendance_from'] ?? null,
            'period_of_attendance_to' => $row['period_of_attendance_to'] ?? null,
            'highest_level' => $row['highest_level'] ?? null,
            'year_graduated' => $row['year_graduated'] ?? null,
            'scholarship_academic_honors_recieved' => $row['scholarship_academic_honors_recieved'] ?? null,
        ]);
    }
}