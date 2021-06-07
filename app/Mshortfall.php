<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mshortfall extends Model
{
    protected $table = 'master_shortfall';
    protected $fillable = [
        'min',
        'max',
        'title',
        'score',
        'created_at','updated_at'
    ];
}
