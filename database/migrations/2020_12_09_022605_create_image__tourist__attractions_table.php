<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->integer("image_id");
            $table->String("image_name",255);
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
        Schema::dropIfExists('image_tourist_attractions');
        Schema::dropIfExists('tourist_attractions',function (Blueprint $table){
            $table->dropForeign(['tourist_id']);
        });

    }
}
