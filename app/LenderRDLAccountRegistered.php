<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LenderRDLAccountRegistered extends Model
{
    protected $table = 'lender_rdl_account_registered';
    protected $fillable = [
        'responseuuid','journalnum','cifnumber','mobilephone','branchopening','idnumber','customername','uid','created_at','updated_at','account_number','status'
    ];
}
