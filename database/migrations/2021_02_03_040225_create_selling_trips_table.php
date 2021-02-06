<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellingTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selling_trips', function (Blueprint $table) {
            $table->bigIncrements('selling_id');
            $table->date('c_date',255);
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('admin_id')->on('admins')->onDelete('cascade');
            $table->unsignedBigInteger('confirm_id');
            $table->foreign('confirm_id')->references('confirm_id')->on('confirmations')->onDelete('cascade');
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
        Schema::dropIfExists('selling_trips');
        Schema::dropIfExists('booking_trips',function (Blueprint $table){
            $table->dropForeign(['booking_id']);
        });
    }
}
