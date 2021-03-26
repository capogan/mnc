<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderDirectorData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_director_data', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lender_business');
            $table->string('director_nik');
            $table->string('director_name');
            $table->date('director_dob');
            $table->string('director_phone_number');
            $table->string('director_email');
            $table->string('director_npwp');
            $table->string('director_level');
            $table->string('identity_photo');
            $table->string('self_photo');
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
        Schema::dropIfExists('lender_director_data');
    }
}
