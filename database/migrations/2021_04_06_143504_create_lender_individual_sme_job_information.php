<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderIndividualSmeJobInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_individual_sme_job_information', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lender_individual');
            $table->string('payment_level');
            $table->date('payment_date');
            $table->string('job');
            $table->integer('id_length_work'); //master length of work
            $table->string('company_name');
            $table->string('company_phone_number');
            $table->integer('province'); //from province
            $table->integer('city'); //from regencies
            $table->integer('district'); //from district
            $table->integer('villages'); //from villages
            $table->text('company_full_address');
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
        Schema::dropIfExists('lender_individual_sme_job_information');
    }
}
