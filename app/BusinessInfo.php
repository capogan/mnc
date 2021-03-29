<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessInfo extends Model
{
    protected $table = 'personal_business';
    protected $fillable = [
        'uid',
        'business_name',
        'id_cap_of_business',
        'id_credit_score_income_factor',
        'business_established_since',
        'total_employees',
        'business_description',
        'business_full_address',
        'business_province',
        'business_city',
        'business_sub_kecamatan',
        'business_sub_kelurahan',
        'business_zip_code',
        'business_phone_number',
        'business_place_status',
        'partnership_since',
        'legality_status',
        'average_sales_revenue_six_month',
        'average_monthly_expenditure_six_month',
        'average_monthly_profit_six_month',
        'created_at',
        'updated_at'
    ];

    public function income_factory()
    {
        return $this->hasOne(IncomeFactory::class , 'id' , 'id_credit_score_income_factor');
    }
}
