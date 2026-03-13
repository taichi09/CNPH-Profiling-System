<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{

    protected $table = 'work_experience';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'employee_id';
    
    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'inclusive_date_from',
        'inclusive_date_to',
        'position_title',
        'department_agency_office_company',
        'monthly_salary',
        'salary_grade',
        'status_of_appointment',
        'govt_service',
    ];
    
    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'employee_id', 'employee_id');
    }
}
