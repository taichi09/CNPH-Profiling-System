<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherInformation extends Model
{
    //
    protected $table = 'other_information';

    protected $primaryKey = 'other_info_id';

    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'special_skills_and_hobbies',
        'non_academic_distinction',
        'membership_in_association',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'employee_id', 'employee_id');
    }
}
