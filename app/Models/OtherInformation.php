<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherInformation extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $table = 'other_information';
    protected $primaryKey = 'employee_id';    
    protected $keyType = 'string';
    
    protected $fillable = [
        'employee_id',
        'special_skills_and_hobbies',
        'non_academic_distinction',
        'membership_in_association',
        'landbank_no',
        'dbp_no',
        'sss_id',
        'department_name',
        'position',
        'employment_status',
        'date_resigned',
        'photo'
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'employee_id', 'employee_id');
    }
}
