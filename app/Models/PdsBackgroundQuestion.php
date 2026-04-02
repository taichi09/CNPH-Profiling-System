<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdsBackgroundQuestion extends Model
{
    protected $table = 'pds_background_questions';

    public $timestamps = true;

    protected $fillable = [
        'employee_id',
        'q34a', 'q34a_details',
        'q34b', 'q34b_details',
        'q35a', 'q35a_details',
        'q35b', 'q35b_details', 'q35b_date_filed', 'q35b_status',
        'q36',  'q36_details',
        'q37',  'q37_details',
        'q38a', 'q38a_details',
        'q38b', 'q38b_details',
        'q39',  'q39_details',
        'q40a', 'q40a_details',
        'q40b', 'q40b_details',
        'q40c', 'q40c_details',
        'ref1_name', 'ref1_address', 'ref1_contact',
        'ref2_name', 'ref2_address', 'ref2_contact',
        'ref3_name', 'ref3_address', 'ref3_contact',
        'govt_issued_id', 'id_no', 'id_date_issued',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'employee_id', 'employee_id');
    }
}