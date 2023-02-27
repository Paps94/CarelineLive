<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_trackings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');                          //Link it to a user through a foreign key
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('device_id');                        //Link it to a device through a foreign key
            $table->foreign('device_id')->references('id')->on('devices');
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('device_trackings');
    }
}
