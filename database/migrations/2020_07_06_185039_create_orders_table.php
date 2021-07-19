<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->index()->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('data')->nullable();
            $table->text('github_issue_link')->unique()->nullable();
            $table->text('google_drive_in_folder_link')->nullable();
            $table->text('google_drive_out_folder_link')->nullable();
            $table->text('google_drive_folder_link')->nullable();
            $table->date('requested_due_date')->nullable();
            $table->timestamps();

            $table->foreignId('user_id');
            $table->foreignId('location_id');
            $table->foreignId('service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
