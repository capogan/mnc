<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEKYC extends Model
{
    protected $table = 'user_ekyc';
    protected $fillable = [
        'id','callback','created_at','updated_at'
    ];
}
