<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderIndividualEmergencyContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_individual_emergency_contact', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lender_individual');
            $table->string('emergency_name');
            $table->integer('emergency_siblings');//from siblings master
            $table->string('emergency_phone_number');
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
        Schema::dropIfExists('lender_individual_emergency_contact');
    }
}
