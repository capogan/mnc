<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterReligion extends Model
{
    protected $table = 'master_religion';
    protected $fillable = [
        'name' , 'created_at','updated_at','status'
    ];
}
