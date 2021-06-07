<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LenderRDLAccountRegisteredLogs extends Model
{
    protected $table = 'lender_rdl_account_registered_logs';
    protected $fillable = [
        'response','created_at','updated_at','uid'
    ];
    
}
