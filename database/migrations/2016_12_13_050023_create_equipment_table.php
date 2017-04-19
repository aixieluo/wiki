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
//            $table->string('name')->comment('装备名称');//瑕疵，装备名称重复，没有提取出来
            $table->integer('equipment_name_id')->unsigned()->comment('装备名称外键');
            $table->integer('lv')->comment('装备等级');
//            $table->boolean('rank')->comment('是否为高级装备');
            $table->string('main_slot')->comment('装备的主要位置');
            $table->string('describe')->comment('装备描述');
            $table->integer('price')->comment('出售单价');
            $table->foreign('equipment_name_id')->references('id')->on('equipment_names')->onDelete('cascade');
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
