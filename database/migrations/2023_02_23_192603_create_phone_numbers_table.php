<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_numbers', function (Blueprint $table) {
            $table->id();
            /**
            * Phone numbers are a delicate issue not only because of GDPR but also because there is a contraversy around how
            * they should be handled. For this occation I assume all numbers are British and we will NOT be storing the leading 0
            * 7 123 456 789
            */
            $table->bigInteger('number')->length(10)->unique();
            $table->unsignedBigInteger('network_provider_id');                                    //Link it to a network provider through a foreign key
            $table->foreign('network_provider_id')->references('id')->on('network_providers');
            $table->unsignedBigInteger('sim_card_id');                                            //Link it to a card through a foreign key
            $table->foreign('sim_card_id')->references('id')->on('sim_cards');
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
        Schema::dropIfExists('phone_numbers');
    }
}
