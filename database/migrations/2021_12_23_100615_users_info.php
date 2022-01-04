<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_info', function(Blueprint $table){
            $table->id();
            $table->integer('user_id');
            $table->string('name')->nullable();
            $table->string('job')->nullable();
            $table->string('phone')->nullable();
            $table->string('adress')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->string('vk')->nullable();
            $table->string('telegram')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::dropIfExists('user_info');
    }
}
