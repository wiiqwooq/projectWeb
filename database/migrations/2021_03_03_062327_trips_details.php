<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TripsDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips_details', function (Blueprint $table) {
            $table->integer("detail_id");
            $table->date("date");
            $table->time("time");
            $table->integer('trips_id');
            $table->foreign('trips_id')->references('trips_id')->on('trips')->onDelete('cascade');
            $table->integer('tourist_id');
            $table->foreign('tourist_id')->references('tourist_id')->on('tourist_attractions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trips_details ', function (Blueprint $table) {
            $table->dropIfExists('trips_id');
            $table->dropIfExists('tourist_id');
        });
    }
}
