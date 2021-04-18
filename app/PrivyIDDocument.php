<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivyIDDocument extends Model
{
    protected $table = 'privyid_documents';
    protected $fillable = [
       'title','type','owner','document','recipients','token','url','document_status'.'document_response_json','codification',
       'status_response_json','status_recipients','last_status_updated','privy_uploadable_id','privy_uploadable_type'
       ,'created_at','updated_at','document_function'
    ];
}
