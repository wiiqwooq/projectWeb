<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookingTrips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_trips ', function (Blueprint $table) {
            $table->integer("booking_id");
            $table->date("booking_date");
            $table->integer("total");
            $table->integer("total_price");
            $table->String("Payment_status",40);
            $table->integer('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->integer('trips_id');
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
        Schema::table('booking_trips ', function (Blueprint $table) {
            $table->dropIfExists('user_id');
            $table->dropIfExists('trips_id');
        });
    }
}
