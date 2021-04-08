<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LenderIndividualJobInformation extends Model
{
    protected $table = 'lender_individual_sme_job_information';
    protected $fillable = [
        'id',
        'id_lender_individual',
        'payment_level',
        'payment_date',
        'job',
        'id_length_work',
        'company_name',
        'company_phone_number',
        'province',
        'city',
        'district',
        'villages',
        'company_full_address',
        'npwp',
        'kode_pos',
        'created_at',
        'updated_at',
    ];
}
