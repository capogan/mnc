<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterCapOfBusiness extends Model
{
    protected $table = 'cap_of_business_criteria';
    protected $fillable = [
        'title' , 'd_asset','status','mix','max'
    ];
}
