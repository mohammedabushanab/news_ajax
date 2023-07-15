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
            $table->id();
            $table->string('first_name');
            $table->string('middel_name');
            $table->string('last_name');
            $table->integer('phone');
            $table->enum('gender',['female','male']);
            $table->date('date_of_birthday');
            $table->string('image')->nullable();
            $table->morphs('actor');
            $table->foreignId('country_id');
            $table->foreign('country_id')->on('countries')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}