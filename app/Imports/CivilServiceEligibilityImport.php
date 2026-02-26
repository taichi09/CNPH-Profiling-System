<?php

namespace App\Imports;

use App\Models\CivilServiceEligibility;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;

class CivilServiceEligibilityImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new CivilServiceEligibility([
            'employee_id'          => $row['employee_id']          ?? null,
            'eligibility'          => $row['eligibility']          ?? null,
            'rating'               => $row['rating']               ?? null,
            'date_of_examination'  => isset($row['date_of_examination'])
                ? (is_numeric($row['date_of_examination'])
                    ? ExcelDate::excelToDateTimeObject($row['date_of_examination'])->format('Y-m-d')
                    : Carbon::parse($row['date_of_examination'])->format('Y-m-d'))
                : null,
            'place_of_examination' => $row['place_of_examination'] ?? null,
            'license_no'           => $row['license_no']           ?? null,
            'license_validity'     => isset($row['license_validity'])
                ? (is_numeric($row['license_validity'])
                    ? ExcelDate::excelToDateTimeObject($row['license_validity'])->format('Y-m-d')
                    : Carbon::parse($row['license_validity'])->format('Y-m-d'))
                : null,
        ]);
    }
}