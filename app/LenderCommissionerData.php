<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LenderCommissionerData extends Model
{
    protected $table = 'lender_commissioner_data';
    protected $fillable = [
        'id','uid','commissioner_nik','commissioner_name','commissioner_dob','commissioner_phone_number','commissioner_email','commissioner_npwp','commissioner_level','created_at','updated_at',
        'identity_photo','self_photo','province_id','regency_id','village_id','district_id','sequence','address'
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
