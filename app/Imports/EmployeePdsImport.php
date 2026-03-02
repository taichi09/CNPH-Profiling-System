<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Imports\PersonalInformationImport;
use App\Imports\FamilyBackgroundImport;
use App\Imports\EducationalBackgroundImport;
use App\Imports\CivilServiceEligibilityImport;
use App\Imports\WorkExperienceImport;
use App\Imports\VoluntaryWorkImport;
use App\Imports\LearningAndDevelopmentImport;
use App\Imports\OtherInformationImport;

class EmployeePdsImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'personal_information' => new PersonalInformationImport(),
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