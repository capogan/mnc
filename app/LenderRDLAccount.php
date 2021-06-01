<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LenderRDLAccount extends Model
{
    protected $table = 'lender_rdl_account';
    protected $fillable = [
        'title','status','firstname','middlename','lastname','optnpwp','nationality','domicilecountry','religion','birthplace','birthdate','ismarried','mothermaidenname','jobcode','education','idnumber','idissuingcity','idexpirydate','addressstreet','addressrtrwperum','addresskel','addresskec','zipcode','homephone1','homephone2','officephone1','officephone2','mobilephone1','mobilephone2','faxnum1','faxnum2','email','monthlyincome','branchopening','status','gender','uid','created_at','updated_at',
    ];
    
}
