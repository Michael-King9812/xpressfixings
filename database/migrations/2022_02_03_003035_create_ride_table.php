<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride', function (Blueprint $table) {
            $table->id();
            $table->string('ridePrice');
            $table->string('rideCurrentLocation');
            $table->string('rideCurrentCity');
            $table->string('rideCurrentState');
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
        Schema::dropIfExists('ride');
    }
}
