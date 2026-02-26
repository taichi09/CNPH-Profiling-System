<?php

namespace App\Imports;

use App\Models\WorkExperience;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;

class WorkExperienceImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new WorkExperience([
            'employee_id'                      => $row['employee_id']                      ?? null,
            'inclusive_date_from'              => isset($row['inclusive_date_from'])
                ? (is_numeric($row['inclusive_date_from'])
                    ? ExcelDate::excelToDateTimeObject($row['inclusive_date_from'])->format('Y-m-d')
                    : Carbon::parse($row['inclusive_date_from'])->format('Y-m-d'))
                : null,
            'inclusive_date_to'                => isset($row['inclusive_date_to'])
                ? (is_numeric($row['inclusive_date_to'])
                    ? ExcelDate::excelToDateTimeObject($row['inclusive_date_to'])->format('Y-m-d')
                    : Carbon::parse($row['inclusive_date_to'])->format('Y-m-d'))
                : null,
            'position_title'                   => $row['position_title']                   ?? null,
            'department_agency_office_company' => $row['department_agency_office_company'] ?? null,
            'status_of_appointment'            => $row['status_of_appointment']            ?? null,
            'govt_service'                     => $row['govt_service']                     ?? null,
        ]);
    }
}