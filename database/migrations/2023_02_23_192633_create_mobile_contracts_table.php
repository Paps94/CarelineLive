<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobileContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');                                              //Link it to a user through a foreign key
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('network_provider_id');                                  //Link it to a simcard through a foreign key
            $table->foreign('network_provider_id')->references('id')->on('network_providers');
            $table->unsignedBigInteger('sim_card_id');                                           //Link it to a sim card through a foreign key
            $table->foreign('sim_card_id')->references('id')->on('sim_cards');
            $table->unsignedBigInteger('phone_number_id');                                       //Link it to a phone number through a foreign key
            $table->foreign('phone_number_id')->references('id')->on('phone_number_id');
            $table->integer('duration');                                                        //Duration of contract in months usually 12, 18, 24
            $table->date('exipres');                                                            //Date it expires
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
        Schema::dropIfExists('mobile_contracts');
    }
}
