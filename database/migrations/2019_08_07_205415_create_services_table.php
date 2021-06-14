<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('img')->nullable();
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('deadline')->nullable();
            $table->text('example')->nullable();
            $table->boolean('available')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreignId('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
