<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterLengthOfWork extends Model
{
    protected $table = 'master_length_of_work';
    protected $fillable = [
       'length_of_work','created_at','updated_at'
    ];
}
