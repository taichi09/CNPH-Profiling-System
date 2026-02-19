<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyBackground extends Model
{
    //
    protected $table = 'family_background';
    protected $primaryKey = 'employee_id';
    public $incrementing = false; 
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'employee_id', 'spouse_surname', 'spouse_first_name', 'spouse_middle_name',
        'spouse_name_extension', 'occupation', 'employer_business_name',
        'business_address', 'telephone_no', 'name_of_children', 'date_of_birth',
        'father_surname', 'father_first_name', 'father_middle_name',
        'father_name_extension', 'mother_maiden_name', 'mother_surname',
        'mother_first_name', 'mother_middle_name'
    ];

    public function getNameOfChildrenAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }
    public function setNameOfChildrenAttribute($value)
    {
        $this->attributes['name_of_children'] = is_array($value) ? implode(',', $value) : $value;
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = is_array($value) ? implode(',', $value) : $value;
    }

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'employee_id', 'employee_id');
    }
}