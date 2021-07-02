<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->index();
            $table->text('comment');
            $table->integer('stars')->nullable();
            $table->boolean('is_visible')->default(false);
            $table->boolean('is_highlight')->default(false);
            $table->string('hash')->nullable();
            $table->timestamps();

            $table->foreignId('user_id');
            $table->foreignId('service_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
