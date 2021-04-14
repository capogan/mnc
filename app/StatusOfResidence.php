<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusOfResidence extends Model
{
    protected $table = 'status_of_residence';
    protected $fillable = [
        'name', 'created_at', 'updated_at',
    ];
}
