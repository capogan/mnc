<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestFunding extends Model
{
    protected $table = 'request_funding';
    protected $fillable = [
        'id','uid','status','created_at','updated_at'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
