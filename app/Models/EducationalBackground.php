<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    public $timestamps = false;

    protected $table = 'educational_background';

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
        return $this->belongsTo(PersonalInformation::class, 'employee_id', 'employee_id');
    }
}
