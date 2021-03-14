<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersFile extends Model
{
    protected $table = 'users_file';
    protected $fillable = [
       'uid','identity_photo','self_photo','npwp_photo','business_build_photo','siup_photo','business_owner_photo','business_documents_photo',
        'business_activity_photo','npwp_business_photo','created_at','updated_at'
    ];
}
