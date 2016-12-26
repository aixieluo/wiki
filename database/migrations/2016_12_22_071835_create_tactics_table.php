<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTacticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tactics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('战术名称');//瑕疵，战术名称重复，没有提取出来
            $table->integer('lv')->comment('战术等级');
            $table->string('describe')->comment('战术描述');
            $table->integer('fire_up')->comment('提升基础火力');
            $table->integer('penetrate_up')->default(0)->comment('提升基础穿甲');
            $table->integer('durable_up')->default(0)->comment('提升基础耐久');
            $table->integer('armor_up')->default(0)->comment('提升基础装甲');
            $table->integer('hit_up')->default(0)->comment('提升基础命中');
            $table->integer('dodge_up')->default(0)->comment('提升基础闪避');
            $table->integer('concealment_up')->default(0)->comment('提升基础隐蔽');
            $table->integer('spy_up')->default(0)->comment('提升基础侦查');
            $table->integer('fire_down')->default(0)->comment('降低装备火力');
            $table->integer('penetrate_down')->default(0)->comment('降低装备穿甲');
            $table->integer('durable_down')->default(0)->comment('降低装备耐久');
            $table->integer('armor_down')->default(0)->comment('降低装备装甲');
            $table->integer('hit_down')->default(0)->comment('降低装备命中');
            $table->integer('dodge_down')->default(0)->comment('降低装备闪避');
            $table->integer('concealment_down')->default(0)->comment('降低装备隐蔽');
            $table->integer('spy_down')->default(0)->comment('降低装备侦查');
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
        Schema::dropIfExists('tactics');
    }
}
