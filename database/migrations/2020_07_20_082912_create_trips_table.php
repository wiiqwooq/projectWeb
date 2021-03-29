<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('trips_id');
            $table->string('trips_name',255);
            $table->integer('province_id');
            $table->foreign('province_id')->references('province_id')->on('provinces')->onDelete('cascade');
            $table->date("start_date");
            $table->date("end_date");
            $table->integer("amount");
            $table->integer("price");
            $table->string('trips_status',40);
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
        Schema::dropIfExists('trips');
    }
}
