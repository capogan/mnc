<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LenderDirectorData extends Model
{
    protected $table = 'lender_director_data';
    protected $fillable = [
        'id','uid','director_nik','director_name','director_dob','director_phone_number','director_email','director_npwp','director_level','created_at','updated_at',
        'identity_photo','self_photo','province_id','regency_id','village_id','district_id','position','address','kodepos','gender','npwp_image','director_pob'
    ];

    public function provinces()
    {
        return $this->hasOne(Province::class , 'id' ,'province_id');
    }
    public function cities()
    {
        return $this->hasOne(Regency::class , 'id' ,'regency_id');
    }
    public function districts()
    {
        return $this->hasOne(District::class , 'id' ,'district_id');
    }
    public function villagess()
    {
        return $this->hasOne(Village::class , 'id' ,'village_id');
    }
    public function digisign()
    {
        return $this->hasOne(DigisignActivation::class , 'uid' ,'uid');
    }
}
