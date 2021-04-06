<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderIndividual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_individual_personal_info', function (Blueprint $table) {
            $table->id();
            $table->string('identity_number',20);
            $table->string('full_name',255);
            $table->char('gender');
            $table->string('pob');
            $table->date('dob');
            $table->integer('married_status')->nullable(); //from table married_status
            $table->string('mother_name')->nullable();
            $table->string('status_of_residence')->nullable();
            $table->integer('province'); //from province
            $table->integer('city'); //from regencies
            $table->integer('district'); //from district
            $table->integer('villages'); //from villages
            $table->text('full_address');
            $table->string('no_npwp');
            $table->integer('total_credit_card');
            $table->string('no_bpjs_tk')->nullable();
            $table->string('no_bpjs_kesehatan')->nullable();
            $table->integer('education'); //from education
            $table->string('whatsapp_number');
            $table->string('email');
            $table->integer('lender_type');//1 is SME ; 2 is Non SME
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
        Schema::dropIfExists('lender_individual');
    }
}
