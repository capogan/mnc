<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_info', function (Blueprint $table) {
            $table->id();
            $table->integer('uid');
            $table->bigInteger('identity_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->char('gender',10);
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->longText('address');
            $table->integer('province');
            $table->integer('city');
            $table->string('zip_code');
            $table->string('education',10);
            $table->string('npwp_number');
            $table->smallInteger('total_cc')->nullable();
            $table->string('bpjs_employee_number')->nullable();
            $table->string('bpjs_health_number')->nullable();
            $table->string('phone_number');
            $table->string('whatsapp_number');
            $table->integer('married_status');
            $table->string('mother_name');
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
        Schema::dropIfExists('personal_info');
    }
}
