<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSpecification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specifications', function (Blueprint $table) {
            $table->text('img')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('deadline')->nullable();
            $table->text('example')->nullable();
            $table->foreignId('category_id')->nullable();
            
            $table->foreign('category_id')->references('id')->on('categories');
            
            $table->dropColumn('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
