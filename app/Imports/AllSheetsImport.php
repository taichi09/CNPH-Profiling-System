<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AllSheetsImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'personal_information' => new EmployeesImport(),
            'family_background' => new FamilyBackgroundImport(),
            'educational_background' => new EducationalBackgroundImport(),
            'civil_service_eligibility' => new CivilServiceEligibilityImport(),
            'work_experience' => new WorkExperienceImport(),
            'voluntary_work' => new VoluntaryWorkImport(),
            'learning_and_development' => new LearningAndDevelopmentImport(),
            'other_information' => new OtherInformationImport(),
        ];
    }
}