<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');                        //Link it to a user through a foreign key
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('type', ['phone', 'tablet'])->default('phone');  //Added the default option due to this `Typically a phone, though could be a tablet`
            $table->string('serial_number')->unique();                    //Can contain numbers and letters
            $table->bigInteger('imei')->length(15)->unique();                        //According to google this is strictly numerical and usually 15 digits long
            $table->string('manufacturer');
            $table->string('model');
            $table->enum('operating_system', ['iOS', 'Android']);
            /**
            * Can also take the form of boolean or enum like the line below
            * Not sure if quotes meant literally but either way works!
            */
            // $table->enum('status', ['activated', 'deactivated']);
            $table->boolean('deactivated');
            $table->index(['serial_number', 'imei']);                   //Subject to change based on what the queries look like in the future
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
        Schema::dropIfExists('devices');
    }
}
