<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LenderRDLAccountLogs extends Model
{
    protected $table = 'lender_rdl_account_logs';
    protected $fillable = [
        'response','created_at','updated_at','uid'
    ];
    
}
