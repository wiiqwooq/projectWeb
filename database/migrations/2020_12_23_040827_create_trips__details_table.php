<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTripsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips_details', function (Blueprint $table) {
            $table->bigIncrements("detail_id");
            $table->date("date");
            $table->time("time");
            $table->unsignedBigInteger('trips_id');
            $table->foreign('trips_id')->references('trips_id')->on('trips')->onDelete('cascade');
            $table->unsignedBigInteger('tourist_id');
            $table->foreign('tourist_id')->references('tourist_id')->on('tourist_attractions')->onDelete('cascade');
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

        Schema::dropIfExists('trips_detials');
        Schema::dropIfExists('trips',function (Blueprint $table){
            $table->dropForeign(['trips_id']);
        });
        Schema::dropIfExists('tourist_attractions',function (Blueprint $table){
            $table->dropForeign(['tourist_id']);
        });
        

    }
}
