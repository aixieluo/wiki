<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDancerSlotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dancer_slot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dancer_id')->unsigned();
            $table->integer('slot_id')->unsigned();
            $table->integer('count')->comment('关联装备槽个数');
//            $table->foreign('dancer_id')->references('id')->on('dancers')->onDelete('cascade');
//            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dancer_slot');
    }
}
