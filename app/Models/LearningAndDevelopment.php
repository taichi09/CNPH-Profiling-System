<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningAndDevelopment extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $table = 'learning_and_development_interventions';    
    protected $primaryKey = 'employee_id';
    protected $keyType = 'string';

    protected $fillable = [
        'employee_id',
        'title_of_learning_and_development_interventions',
        'inclusive_date_from',
        'inclusive_date_to',
        'number_of_hours',
        'type_of_l_d',
        'conducted_sponsored_by',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'employee_id', 'employee_id');
    }
}
