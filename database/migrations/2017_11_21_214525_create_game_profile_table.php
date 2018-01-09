<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid');
            $table->char('access_token',32)->nullable();
            $table->string('client_token',36)->nullable();
            $table->char('session',32)->nullable();
            $table->string('server',41)->nullable();
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
        Schema::dropIfExists('game_session');
    }
}
