<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependents extends Model
{
    protected $table = 'master_dependents';
    protected $fillable = [
        'title','status','created_at','updated_at'
    ];
}
