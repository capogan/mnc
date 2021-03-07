<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanRequest extends Model
{
    protected $table = 'request_loan';
    protected $fillable = [
        'invoice_number' , 'uid', 'loan_amount','loan_period','admin_fee_percentage','admin_fee_amount','interest_fee_percentage','interest_fee_amount','disbrusement','repayment','penalty_percentage',
        'penalty_max_percentage','penalty_max_amount','status','created_at','updated_at'        
    ];
}
