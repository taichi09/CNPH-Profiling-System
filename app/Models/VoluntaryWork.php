<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoluntaryWork extends Model
{
    //
    protected $table = 'voluntary_work';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'employee_id';

    public $timestamps = false;

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