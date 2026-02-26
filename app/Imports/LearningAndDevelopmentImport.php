<?php

namespace App\Imports;

use App\Models\LearningAndDevelopment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;

class LearningAndDevelopmentImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new LearningAndDevelopment([
            'employee_id'                                     => $row['employee_id']                                     ?? null,
            'title_of_learning_and_development_interventions' => $row['title_of_learning_and_development_interventions'] ?? null,
            'inclusive_date_from'                             => isset($row['inclusive_date_from'])
                ? (is_numeric($row['inclusive_date_from'])
                    ? ExcelDate::excelToDateTimeObject($row['inclusive_date_from'])->format('Y-m-d')
                    : Carbon::parse($row['inclusive_date_from'])->format('Y-m-d'))
                : null,
            'inclusive_date_to'                               => isset($row['inclusive_date_to'])
                ? (is_numeric($row['inclusive_date_to'])
                    ? ExcelDate::excelToDateTimeObject($row['inclusive_date_to'])->format('Y-m-d')
                    : Carbon::parse($row['inclusive_date_to'])->format('Y-m-d'))
                : null,
            'number_of_hours'                                 => $row['number_of_hours']                                 ?? null,
            'type_of_l_d'                                     => $row['type_of_l_d']                                     ?? null,
            'conducted_sponsored_by'                          => $row['conducted_sponsored_by']                          ?? null,
        ]);
    }
}