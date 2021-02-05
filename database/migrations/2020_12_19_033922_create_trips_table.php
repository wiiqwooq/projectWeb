<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements("trips_id");
            $table->String("trips_name",255);
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('province_id')->on('provinces')->onDelete('cascade');
            $table->date("start_date");
            $table->date("end_date");
            $table->integer("amount");
            $table->integer("price");
            $table->String("trips_status",40)->default("Available");
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
        Schema::dropIfExists('trips_details');
        Schema::dropIfExists('booking_trips');
        Schema::dropIfExists('trips');
    }
}
