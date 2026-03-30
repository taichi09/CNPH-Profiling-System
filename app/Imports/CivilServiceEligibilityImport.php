<?php

namespace App\Imports;

use App\Models\CivilServiceEligibility;

class CivilServiceEligibilityImport extends SkippableImport
{
    public function model(array $row)
    {
        if (empty($row['employee_id'])) return null;
        if ($this->isDuplicate($row)) return null;

        return new CivilServiceEligibility([
            'employee_id' => $row['employee_id'],
            'eligibility' => $row['eligibility'],
            'rating' => $row['rating'],
            'date_of_examination' => $row['date_of_examination'],
            'place_of_examination' => $row['place_of_examination'],
            'license_no' => $row['license_no'],
            'license_validity' => $row['license_validity'],
        ]);
    }
}