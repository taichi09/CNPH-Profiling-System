<?php

namespace App\Imports;

use App\Models\WorkExperience;

class WorkExperienceImport extends SkippableImport
{
    public function model(array $row)
    {
        if (empty($row['employee_id'])) return null;
        if ($this->isDuplicate($row)) return null;

        return new WorkExperience([
            'employee_id' => $row['employee_id'],
            'inclusive_date_from' => $row['inclusive_date_from'],
            'inclusive_date_to' => $row['inclusive_date_to'],
            'position_title' => $row['position_title'],
            'department_agency_office_company' => $row['department_agency_office_company'],
            'status_of_appointment' => $row['status_of_appointment'],
            'govt_service' => $row['govt_service'],
        ]);
    }
}