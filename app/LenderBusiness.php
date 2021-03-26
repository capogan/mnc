<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LenderBusiness extends Model
{
    protected $table = 'lender_business';
    protected $fillable = [
        'id','business_name','npwp','address','id_province','id_regency','id_district','id_village',
        'phone_number','website','email','induk_berusaha_number','tdp_number','akta_pendirian','last_akta_perubahan','amount_setoran_modal',
        'taxpayer','asset_value','equity_value','short_term_obligations','annual_income','operating_expenses','profit_and_loss', 'created_at','updated_at'
    ];
}
