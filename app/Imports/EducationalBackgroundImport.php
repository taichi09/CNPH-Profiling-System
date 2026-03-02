<?php

namespace App\Imports;

use App\Models\EducationalBackground;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EducationalBackgroundImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row['employee_id'])) return null;

        return new EducationalBackground([
            'employee_id' => $row['employee_id'],
            'level' => $row['level'],
            'name_of_school' => $row['name_of_school'],
            'basic_education' => $row['basic_education'],
            'period_of_attendance_from' => $row['period_of_attendance_from'],
            'period_of_attendance_to' => $row['period_of_attendance_to'],
            'highest_level' => $row['highest_level'],
            'year_graduated' => $row['year_graduated'],
            'scholarship_academic_honors_recieved' => $row['scholarship_academic_honors_recieved'],
        ]);
    }
}