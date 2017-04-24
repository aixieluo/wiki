<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('辎械名称');//瑕疵，辎械名称重复，没有提取出来
            $table->integer('lv')->comment('辎械等级');
            $table->string('describe')->comment('辎械描述');
            $table->float('fire_up', 5, 2)->default(0)->comment('提升基础火力');
            $table->float('penetrate_up', 5, 2)->default(0)->comment('提升基础穿甲');
            $table->float('durable_up', 5, 2)->default(0)->comment('提升基础耐久');
            $table->float('armor_up', 5, 2)->default(0)->comment('提升基础装甲');
            $table->float('hit_up', 5, 2)->default(0)->comment('提升基础命中');
            $table->float('dodge_up', 5, 2)->default(0)->comment('提升基础闪避');
            $table->float('concealment_up', 5, 2)->default(0)->comment('提升基础隐蔽');
            $table->float('spy_up', 5, 2)->default(0)->comment('提升基础侦查');
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
        Schema::dropIfExists('skills');
    }
}
