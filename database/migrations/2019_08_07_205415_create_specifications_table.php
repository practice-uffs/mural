<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('img')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('deadline')->nullable();
            $table->text('example')->nullable();
            $table->boolean('available')->nullable();
            $table->timestamps();

            $table->foreignId('category_id')->nullable();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specifications');
    }
}
