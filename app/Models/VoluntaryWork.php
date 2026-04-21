<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoluntaryWork extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $table = 'voluntary_work';
    protected $primaryKey = 'employee_id';
    protected $keyType = 'string';

    protected $fillable = [
        'employee_id',
        'name_and_address_of_organization',
        'inclusive_date_from',
        'inclusive_date_to',
        'number_of_hours',
        'position_nature_of_work',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'employee_id', 'employee_id');
    }
}