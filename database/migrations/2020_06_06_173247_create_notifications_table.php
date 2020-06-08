<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('app_user_id');
            $table->unsignedBigInteger('deed_id');
            $table->bigInteger('scanner_id')->nullable();
            $table->string('scanner_name')->nullable();
            $table->string('deed_name')->nullable();
            $table->string('type');//scan, deed ready, promotions, etc
            $table->string('message')->nullable();
            $table->boolean('seen');
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
        Schema::dropIfExists('notifications');
    }
}
