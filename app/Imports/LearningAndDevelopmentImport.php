<?php

namespace App\Imports;

use App\Models\LearningAndDevelopment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LearningAndDevelopmentImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row['employee_id'])) return null;

        return new LearningAndDevelopment([
            'employee_id' => $row['employee_id'],
            'title_of_learning_and_development_interventions' => $row['title_of_learning_and_development_interventions'],
            'inclusive_date_from' => $row['inclusive_date_from'],
            'inclusive_date_to' => $row['inclusive_date_to'],
            'number_of_hours' => $row['number_of_hours'],
            'type_of_l_d' => $row['type_of_l_d'],
            'conducted_sponsored_by' => $row['conducted_sponsored_by'],
        ]);
    }
}