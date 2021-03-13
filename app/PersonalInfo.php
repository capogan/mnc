<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $table = 'personal_info';
    protected $fillable = [
        'uid','identity_number','first_name','last_name','gender','place_of_birth','date_of_birth','address','province','city','zip_code','education','npwp_number',
        'total_cc','bpjs_employee_number','bpjs_health_number','phone_number','whatsapp_number','married_status','mother_name','created_at','updated_at','number_of_dependents'
    ];

    public function business()
    {
        return $this->belongsTo(BusinessInfo::class, 'uid' , 'uid');
    }

    public function file()
    {
        return $this->belongsTo(UsersFile::class, 'uid' , 'uid');
    }

}
