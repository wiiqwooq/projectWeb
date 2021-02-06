<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmationsTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmations', function (Blueprint $table) {
            $table->bigIncrements("confirm_id");
            $table->String("account_number",20);
            $table->String("reciept",255);
            $table->date("date");
            $table->unsignedBigInteger('booking_id');
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
        Schema::dropIfExists('confirmations');
        Schema::dropIfExists('admins',function (Blueprint $table){
            $table->dropForeign(['admin_id']);
        });
        Schema::dropIfExists('selling_trips',function (Blueprint $table){
            $table->dropForeign(['selling_id']);
        });
    }
}
