<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModpacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modpacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner');
            $table->string('name');
            $table->string('displayName');
            $table->longText('url')->nullable();
            $table->string('platformUrl')->nullable();
            $table->string('minecraft');
            $table->bigInteger('ratings')->default(0);
            $table->bigInteger('downloads')->default(0);
            $table->bigInteger('runs')->default(0);
            $table->longText('description')->nullable();
            $table->string('tags')->nullable();
            $table->boolean('isServer');
            $table->boolean('isOfficial');
            $table->string('version');
            $table->boolean('forceDir');
            $table->string('feedUrl')->nullable();
            $table->string('iconUrl')->nullable();
            $table->string('logoUrl')->nullable();
            $table->string('backgroundUrl')->nullable();
            $table->string('solderUrl')->nullable();
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
        Schema::dropIfExists('modpacks');
    }
}
