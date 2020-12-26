<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageTouristAttractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_tourist_attractions', function (Blueprint $table) {
            $table->bigIncrements("image_id");
            $table->String("image_name",255);
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
        Schema::dropIfExists('image__tourist__attractions');
    }
}
