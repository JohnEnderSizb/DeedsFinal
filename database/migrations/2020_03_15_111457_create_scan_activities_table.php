<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScanActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scan_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('deed_owner');
            $table->string('deed_title');
            $table->unsignedBigInteger('conveyancer');
            $table->string('scanner');
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
        Schema::dropIfExists('scan_activities');
    }
}
