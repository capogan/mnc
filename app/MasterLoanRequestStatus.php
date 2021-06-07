<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterLoanRequestStatus extends Model
{
    protected $table = 'master_status_loan_request';
    protected $fillable = [
       'title','created_at','updated_at'
    ];

}
