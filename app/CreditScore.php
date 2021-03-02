<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditScore extends Model
{
    protected $table = 'credit_score';
    protected $fillable = [
        'id_category_score','name_score','created_at','updated_at','score','status','sequence' ,'code'
    ];
    public function categories(){
        return $this->belongsTo(CreditScoreCategories::class);
    }
}
