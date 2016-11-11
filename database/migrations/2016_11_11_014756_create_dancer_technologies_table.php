<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDancerTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dancer_technologies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dancer_id')->unsigned();
            $table->integer('technology_id')->unsigned();
            $table->foreign('dancer_id')->references('id')->on('dancers')->onDelete('cascade');
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dancer_technologies');
    }
}
