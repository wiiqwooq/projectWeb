<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SellingTrips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('selling_trips', function (Blueprint $table) {
            $table->integer("selling_id");
            $table->String("account_number",20);
            $table->String("reciept",255);
            $table->date("date");
            $table->integer('booking_id');
            $table->foreign('booking_id')->references('booking_id')->on('booking_trips')->onDelete('cascade');
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
        Schema::dropIfExists('confirms');
        Schema::dropIfExists('selling_trips');
        Schema::dropIfExists('booking_trips',function (Blueprint $table){
            $table->dropForeign(['booking_id']);
        });
    }
}
