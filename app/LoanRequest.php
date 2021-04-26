<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Encryptable;

class LoanRequest extends Model
{
    use Encryptable;
    protected $table = 'request_loan';
    protected $fillable = [
        'invoice_number' , 'uid', 'loan_amount','loan_period','admin_fee_percentage','admin_fee_amount','interest_fee_percentage','interest_fee_amount','disbrusement','repayment','penalty_percentage',
        'penalty_max_percentage','penalty_max_amount','status','created_at','updated_at','id_member_code','lender_uid','due_date_payment','id_member_code'
    ];
    // protected $encryptable = [
    //     'loan_amount'
    // ];

    public function business_info()
    {
        return $this->hasOne(BusinessInfo::class , 'uid' , 'uid')
        ->with('income_factory');
    }

    public function personal_info()
    {
        return $this->hasOne(PersonalInfo::class , 'uid' ,'uid');
    }

    public function scoring()
    {
        return $this->hasOne(RequestLoanCurrentScore::class , 'id_request_loan');
    }

    public function status_title()
    {
        return $this->hasOne(MasterLoanRequestStatus::class , 'id' , 'status');
    }




}
