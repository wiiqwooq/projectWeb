<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_trips', function (Blueprint $table) {
            $table->bigIncrements("booking_id");
            $table->date("booking_date");
            $table->integer("total");
            $table->integer("total_price");
            $table->String("Payment_status",40);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('trips_id');
            $table->foreign('trips_id')->references('trips_id')->on('trips')->onDelete('cascade');
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
        Schema::dropIfExists('booking_trips');
        Schema::dropIfExists('users',function (Blueprint $table){
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('trips',function (Blueprint $table){
            $table->dropForeign(['trips_id']);
        });
    }
}
