<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildingStatus extends Model
{
    protected $table = 'business_place_status';
    protected $fillable = [
        'title','status','created_at','updated_at'
    ];
}
