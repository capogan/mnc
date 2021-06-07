<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogRequestInvoice extends Model
{
    protected $table = 'pcg_request_invoice_log';
    protected $fillable = [
        'data' , 'created_at','updated_at','request_loan_id','created_by','updated_by','status'
    ];
}
