<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherInformation extends Model
{
    protected $table = 'other_information';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'employee_id';
    
    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'special_skills_and_hobbies',
        'non_academic_distinction',
        'membership_in_association',
        'landbank_no',
        'dbp_no',
        'sss_id',
        'department_name',
        'employment_status'
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'employee_id', 'employee_id');
    }
}
