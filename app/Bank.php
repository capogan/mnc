<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'master_bank';
    protected $fillable = [
        'id','bank_name','code'
    ];
}
