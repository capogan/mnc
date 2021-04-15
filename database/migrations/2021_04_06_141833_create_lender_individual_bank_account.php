<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderIndividualBankAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_individual_bank_account', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lender_individual');
            $table->string('account_name');
            $table->integer('id_bank');//master bank
            $table->string('account_number');
            $table->string('phone_number_register_in_bank');
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
        Schema::dropIfExists('lender_individual_bank_account');
    }
}
