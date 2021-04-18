<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivyIDDocumentRecipients extends Model
{
    protected $table = 'privyid_documents_recipients';
    protected $fillable = [
       'privyid','status','type','enterprise_token','magic_link'
       ,'created_at','updated_at'
    ];
}
