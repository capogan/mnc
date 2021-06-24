<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestLoanInstallmentsVa extends Model
{
    protected $table = 'request_loan_installment_va';
    protected $fillable = [
        'id','id_installment','va_number','status','created_at','updated_at','total_payment'
    ];
}
