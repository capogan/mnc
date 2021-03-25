<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderBusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_business', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('npwp');
            $table->integer('id_province');
            $table->bigInteger('id_regency');
            $table->bigInteger('id_district');
            $table->bigInteger('id_village');
            $table->text('address');
            $table->string('phone_number');
            $table->string('website');
            $table->string('email');
            $table->string('induk_berusaha_number');
            $table->string('tdp_number');
            $table->string('akta_pendirian');
            $table->string('last_akta_perubahan');
            $table->float('amount_setoran_modal');
            $table->string('taxpayer');
            $table->float('asset_value');
            $table->float('equity_value');
            $table->float('short_term_obligations');
            $table->float('annual_income');
            $table->float('operating_expenses');
            $table->float('profit_and_loss');
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
        Schema::dropIfExists('lender_business');
    }
}
