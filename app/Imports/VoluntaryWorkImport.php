<?php

namespace App\Imports;

use App\Models\VoluntaryWork;

class VoluntaryWorkImport extends SkippableImport
{
    public function model(array $row)
    {
        if (empty($row['employee_id'])) return null;
        if ($this->isDuplicate($row)) return null;

        return new VoluntaryWork([
            'employee_id'                      => $row['employee_id'],
            'name_and_address_of_organization' => $row['name_and_address_of_organization'],
            'inclusive_date_from'              => $row['inclusive_date_from'],
            'inclusive_date_to'                => $row['inclusive_date_to'],
            'number_of_hours'                  => $row['number_of_hours'],
            'position_nature_of_work'          => $row['position_nature_of_work'],
        ]);
    }
}