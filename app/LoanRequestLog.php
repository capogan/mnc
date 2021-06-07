<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Encryptable;

class LoanRequestLog extends Model
{
    protected $table = 'request_loan';
    protected $fillable = [
        'status','created_at','updated_at','created_by','updated_by','json_log','id_request_loan'
    ];
 
}
