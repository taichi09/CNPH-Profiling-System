<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EmployeePdsImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        // Instantiate once and share into all related importers
        $personalImport = new PersonalInformationImport();

        return [
            'personal_information'      => $personalImport,
            'family_background'         => new FamilyBackgroundImport($personalImport),
            'educational_background'    => new EducationalBackgroundImport($personalImport),
            'civil_service_eligibility' => new CivilServiceEligibilityImport($personalImport),
            'work_experience'           => new WorkExperienceImport($personalImport),
            'voluntary_work'            => new VoluntaryWorkImport($personalImport),
            'learning_and_development'  => new LearningAndDevelopmentImport($personalImport),
            'other_information'         => new OtherInformationImport($personalImport),
        ];
    }
}