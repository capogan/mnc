<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DigiSignInternalLogs extends Model
{
    protected $table = 'digisign_internal_logs';
    protected $fillable = [
       'response','message','created_at','created_by'
    ];
}
