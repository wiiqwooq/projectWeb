<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmations', function (Blueprint $table) {
            $table->bigIncrements('confirm_id');
            $table->date('c_date',255);
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('admin_id')->on('admins')->onDelete('cascade');
            $table->unsignedBigInteger('selling_id');
            $table->foreign('selling_id')->references('selling_id')->on('selling_trips')->onDelete('cascade');
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
