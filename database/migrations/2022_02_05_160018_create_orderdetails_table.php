<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('email');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('phone');
            $table->string('deviceType');
            $table->string('model');
            $table->string('imieNo');
            $table->string('problemCategory');
            $table->string('assignedEngineer');
            $table->string('assignedRider');
            $table->string('complain');
            $table->string('status');
            $table->string('approval');
            $table->string('approvalImage');
            $table->string('deviceFixPrice');            
            $table->string('isBookRide');
            $table->string('ridePrice');
            $table->string('activePhoneNumber');
            $table->string('price');
            $table->string('currentCity');
            $table->string('currentState');
            $table->rememberToken();
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
        Schema::dropIfExists('orderdetails');
    }
}
