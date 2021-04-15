<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LenderIndividualPersonalInfo extends Model
{
    protected $table = 'lender_individual_personal_info';
    protected $fillable = [
        'id',
        'uid',
        'identity_number',
        'full_name',
        'gender',
        'pob',
        'dob',
        'married_status',
        'mother_name',
        'status_of_residence',
        'province',
        'city',
        'district',
        'villages',
        'full_address',
        'no_npwp',
        'total_credit_card',
        'no_bpjs_tk',
        'no_bpjs_kesehatan',
        'education',
        'whatsapp_number',
        'email',
        'lender_type',
        'kodepos',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
