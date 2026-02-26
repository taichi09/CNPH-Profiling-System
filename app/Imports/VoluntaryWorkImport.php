<?php

namespace App\Imports;

use App\Models\VoluntaryWork;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;

class VoluntaryWorkImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new VoluntaryWork([
            'employee_id'                      => $row['employee_id']                      ?? null,
            'name_and_address_of_organization' => $row['name_and_address_of_organization'] ?? null,
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
            'number_of_hours'                  => $row['number_of_hours']                  ?? null,
            'position_nature_of_work'          => $row['position_nature_of_work']          ?? null,
        ]);
    }
}