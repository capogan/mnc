<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_file', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('uid');
            $table->text('identity_photo');
            $table->text('self_photo');
            $table->text('npwp_photo');
            $table->text('bussiness_build_photo')->nullable();
            $table->text('siup_photo')->nullable();
            $table->text('bussiness_owner_photo')->nullable();
            $table->text('business_documents_photo')->nullable();
            $table->text('business_activity_photo')->nullable();
            $table->text('npwp_bussiness_photo')->nullable();
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
        Schema::dropIfExists('users_file');
    }
}
