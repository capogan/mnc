<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderBusinessFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_business_file', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lender_business');
            $table->string('npwp');
            $table->string('nib');
            $table->string('tdp');
            $table->string('akta_pendirian');
            $table->string('akta_perubahan');
            $table->string('director_identity');
            $table->string('director_npwp');
            $table->string('structure_organization');
            $table->string('balance_sheet');
            $table->string('cash_flow_statement');
            $table->string('income statement');
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
        Schema::dropIfExists('lender_business_file');
    }
}
