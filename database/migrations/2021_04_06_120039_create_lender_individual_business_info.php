<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderIndividualBusinessInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_individual_business_info', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lender_individual');
            $table->integer('id_business_legality'); //business_legality
            $table->string('no_siup');
            $table->date('date_of_business_birth');
            $table->integer('province');//from province
            $table->integer('city');//from regencies
            $table->integer('district');//from district
            $table->integer('villages');//from village
            $table->integer('full_address');
            $table->string('phone_number');
            $table->integer('business_place_status');//from business place status
            $table->string('no_npwp');
            $table->float('average_sales_revenue_six_month');
            $table->float('average_monthly_expenditure_six_month');
            $table->float('average_monthly_profit_six_month');
            $table->integer('business_type'); //credit_score_income_factory
            $table->text('business_type_detail');
            $table->integer('total_employee'); //master_all_employee
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lender_individual_business_info');
    }
}
