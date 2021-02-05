<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('fname',255);
            $table->string('lname',255);
            $table->string('phone',10);
            $table->string('addreess',255);
            $table->string('username',255)->unique();
            $table->string('password',255);
            $table->string('user_status',40)->default('Enable');
            $table->rememberToken();
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
        Schema::dropIfExists('booking_trips');
        Schema::dropIfExists('users');
    }
}
