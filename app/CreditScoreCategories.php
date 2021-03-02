<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditScoreCategories extends Model
{
    protected $table = 'category_score';
    protected $fillable = [
        'category_score','created_at','updated_at','code','status'
    ];

    public function creditscore(){
        return $this->hasMany(CreditScore::class);
    }
}
