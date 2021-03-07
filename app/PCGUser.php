<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PCGUser extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name' , 'email','password'
    ];
}
