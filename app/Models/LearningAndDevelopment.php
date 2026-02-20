<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningAndDevelopment extends Model
{
    //
    protected $table = 'learning_and_development_interventions';

    protected $primaryKey = 'learning_id';

    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'title_of_learning_and_development_interventions',
        'inclusive_date_from',
        'inclusive_date_to',
        'number_of_hours',
        'type_of_l_d',
        'conducted_sponsored_by',
    ];

    protected $casts = [
        'inclusive_date_from' => 'date',
        'inclusive_date_to' => 'date',
        'number_of_hours' => 'float',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'employee_id', 'employee_id');
    }
}
