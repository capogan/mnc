<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtpLog extends Model
{
    protected $table = 'request_otp_log';
    protected $fillable = [
        'user_id' ,'otp','phone_number','response','created_at','updated_at','created_by','updated_by'
    ];
}
