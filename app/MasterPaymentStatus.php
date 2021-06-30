<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPaymentStatus extends Model
{
    protected $table = 'master_status_payment';
    protected $fillable = [
       'status_name','created_at','updated_at'
    ];

}
