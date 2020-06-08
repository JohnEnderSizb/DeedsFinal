<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('conveyancer_id');
            $table->unsignedBigInteger('deed_owner_id');
            $table->string('deed_title');
            $table->string('ref_num');
            $table->string('date_created');
            $table->string('length');
            $table->longText('description');
            $table->bigInteger('scanCount')->default(0);
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
        Schema::dropIfExists('deeds');
    }
}
