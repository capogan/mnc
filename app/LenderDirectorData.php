<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LenderDirectorData extends Model
{
    protected $table = 'lender_director_data';
    protected $fillable = [
        'id','uid','director_nik','director_name','director_dob','director_phone_number','director_email','director_npwp','director_level','created_at','updated_at',
        'identity_photo','self_photo','province_id','regency_id','village_id','district','position'
    ];
}
