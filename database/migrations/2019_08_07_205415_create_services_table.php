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
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('work_days')->nullable();
            $table->integer('eval_days')->nullable();
            $table->text('notice')->nullable();
            $table->text('poll')->nullable();
            $table->text('img_url')->nullable();
            $table->text('icon_svg_path')->nullable();
            $table->text('color')->nullable();
            $table->boolean('is_available')->nullable();
            $table->boolean('is_active')->default(true);
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
