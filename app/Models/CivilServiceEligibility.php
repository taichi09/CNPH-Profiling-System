<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CivilServiceEligibility extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $table = 'civil_service_eligibility';
    protected $primaryKey = 'employee_id';
    protected $keyType = 'string';

    protected $fillable = [
        'employee_id',
        'eligibility',
        'rating',
        'date_of_examination',
        'place_of_examination',
        'license_no',
        'license_validity',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'employee_id', 'employee_id');
    }
}
