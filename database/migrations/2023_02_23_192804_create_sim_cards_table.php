<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sim_cards', function (Blueprint $table) {
            $table->id();
            $table->string('iccid')->unique();                                                    // Integrated Circuit Card Identification Number 18-22 digits
            $table->unsignedBigInteger('network_provider_id');                                    //Link it to a network provider through a foreign key
            $table->foreign('network_provider_id')->references('id')->on('network_providers');
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
        Schema::dropIfExists('sim_cards');
    }
}
