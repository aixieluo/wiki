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
            $table->integer('skill_info_id')->unsigned()->comment('辎械信息外键');
            $table->integer('lv')->comment('辎械等级');
            $table->float('fire_up', 5, 2)->default(0)->comment('提升基础火力');
            $table->float('penetrate_up', 5, 2)->default(0)->comment('提升基础穿甲');
            $table->float('durable_up', 5, 2)->default(0)->comment('提升基础耐久');
            $table->float('armor_up', 5, 2)->default(0)->comment('提升基础装甲');
            $table->float('hit_up', 5, 2)->default(0)->comment('提升基础命中');
            $table->float('dodge_up', 5, 2)->default(0)->comment('提升基础闪避');
            $table->float('concealment_up', 5, 2)->default(0)->comment('提升基础隐蔽');
            $table->float('spy_up', 5, 2)->default(0)->comment('提升基础侦查');
//            $table->foreign('skill_info_id')->references('id')->on('skill_infos')->onDelete('cascade');
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
