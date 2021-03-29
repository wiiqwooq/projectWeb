<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTouristAttractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_attractions', function (Blueprint $table) {
            $table->integer("tourist_id");
            $table->String("tourist_name",255);
            $table->integer('province_id');
            $table->foreign('province_id')->references('province_id')->on('provinces')->onDelete('cascade');
            $table->String("tourist_status",40)->default("Available");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('image_tourist_attractions');
        Schema::dropIfExists('trips_details');
        Schema::dropIfExists('tourist_attractions');
    }
}
