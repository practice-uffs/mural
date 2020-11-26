<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('sticker_id');
            $table->foreignId('user_id');
            $table->text('data');
            $table->timestamps();

            $table->index('sticker_id');
            $table->index('user_id');

            $table->foreign('sticker_id')->references('id')->on('stickers');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interactions');
    }
}
