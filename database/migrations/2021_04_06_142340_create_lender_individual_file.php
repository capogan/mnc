<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderIndividualFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_individual_file', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lender_individual');
            $table->string('identity_image');
            $table->string('self_image');
            $table->string('npwp_image');
            $table->string('business_place_image')->nullable();
            $table->string('license_business_document_image')->nullable();
            $table->string('proof_of_ownership_image')->nullable();
            $table->string('document_image')->nullable();
            $table->string('business_activity_image')->nullable();
            $table->string('business_npwp_image')->nullable();
            //for non sme
            $table->string('sallary_slip_image')->nullable();
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
        Schema::dropIfExists('lender_individual_file');
    }
}
