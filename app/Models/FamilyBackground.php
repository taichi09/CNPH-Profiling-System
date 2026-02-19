<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyBackground extends Model
{
    //
    protected $table = 'educational_background';

    public $timestamp = false;

    protected $fillable =   [
        'employee_id',
        'level',
        'name_of_school',
        'basic_education',
        'period_of_attendance_from',
        'period_of_attendance_to',
        'highest_level',
        'year_graduated',
        'scholarship_academic_honors_recieved',
    ];

    public function personalInformation()
    {
        return $this->belongTo(PersonalInformation::class, 'employee_id', 'employee_id');
    }
}
