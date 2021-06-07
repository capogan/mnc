<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestLoanDocument extends Model
{
    protected $table = 'request_loan_document';
    protected $fillable = [
        'id','document_id','request_loan_id','created_at','updated_at','status','reason'
    ];

    public function document()
    {
        return $this->hasOne(DigiSignDocument::class, 'document_id' ,'document_id')
        ->with('signers');
    }

    
}
