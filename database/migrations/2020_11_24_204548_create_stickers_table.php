<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stickers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('whiteboard_id');
            $table->text('data');
            $table->timestamps();

            $table->index('whiteboard_id');
        });

        Schema::table('stickers', function($table) {
            $table->foreign('whiteboard_id')->references('id')->on('whiteboards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stickers');
    }
}
