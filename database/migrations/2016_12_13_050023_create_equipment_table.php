<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipment_info_id')->unsigned()->comment('装备信息外键');
            $table->integer('slot_id')->unsigned()->comment('装备槽位外键');
            $table->integer('lv')->comment('装备等级');
            $table->integer('price')->comment('出售单价');
            $table->boolean('main')->default(0)->comment('是否为主要部件');
            $table->foreign('equipment_info_id')->references('id')->on('equipment_infos')->onDelete('cascade');
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }
}
