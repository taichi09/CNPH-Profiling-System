<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    public $incrementing = true;
    public $timestamps = true;    

    protected $table = 'personal_information';    
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    protected $fillable = [
        'employee_id', 'surname', 'first_name', 'middle_name', 'extension', 
        'date_of_birth', 'place_of_birth',
        'sex_at_birth', 'civil_status', 'height', 'weight', 'blood_type', 
        'umid_id_no', 'pagibig_id_no', 'philhealth_id_no', 'philsys_no',
        'tin_no', 'agency_employee_no', 'citizenship', 'residential_address',
        'residential_zip_code', 'permanent_address', 'permanent_zip_code', 
        'telephone_no', 'email_address', 'mobile_no'
    ];
    public function familyBackground()
    {
        return $this->hasOne(FamilyBackground::class, 'employee_id', 'employee_id');
    }
    public function educations()
    {
        return $this->hasMany(EducationalBackground::class, 'employee_id', 'employee_id');
    }
    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class, 'employee_id', 'employee_id');
    }
    public function eligibilities()
    {
        return $this->hasMany(CivilServiceEligibility::class, 'employee_id', 'employee_id');
    }
    public function voluntaryWorks()
    {
        return $this->hasMany(VoluntaryWork::class, 'employee_id', 'employee_id');
    }
    public function learningAndDevelopments()
    {
        return $this->hasMany(LearningAndDevelopment::class, 'employee_id', 'employee_id');
    }
    public function otherInformations()
    {
        return $this->hasMany(OtherInformation::class, 'employee_id', 'employee_id');
    }

    public function backgroundQuestions()
    {
        return $this->hasOne(PdsBackgroundQuestion::class, 'employee_id', 'employee_id');
    }

}
