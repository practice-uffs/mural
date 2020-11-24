<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('user_id');
            $table->foreignId('parent_id')->nullable();
            $table->foreignId('location_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('specification_id')->nullable();

            $table->integer('status')->default(1);
            $table->integer('type')->default(1);
            $table->string('title', 200)->default('');
            $table->text('description')->nullable();
            $table->boolean('hidden')->default(false);
            $table->text('github_issue_link')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('parent_id');
            $table->index('location_id');
            $table->index('category_id');
            $table->index('type');
            $table->index('hidden');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('parent_id')->references('id')->on('items');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('specification_id')->references('id')->on('specifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
