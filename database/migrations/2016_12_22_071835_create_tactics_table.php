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
            $table->integer('tactic_info_id')->unsigned()->comment('战术信息外键');
            $table->integer('lv')->comment('战术等级');
            $table->float('fire_up', 5, 2)->default(0)->comment('提升基础火力');
            $table->float('penetrate_up', 5, 2)->default(0)->comment('提升基础穿甲');
            $table->float('durable_up', 5, 2)->default(0)->comment('提升基础耐久');
            $table->float('armor_up', 5, 2)->default(0)->comment('提升基础装甲');
            $table->float('hit_up', 5, 2)->default(0)->comment('提升基础命中');
            $table->float('dodge_up', 5, 2)->default(0)->comment('提升基础闪避');
            $table->float('concealment_up', 5, 2)->default(0)->comment('提升基础隐蔽');
            $table->float('spy_up', 5, 2)->default(0)->comment('提升基础侦查');
            $table->float('fire_down', 5, 2)->default(0)->comment('降低装备火力');
            $table->float('penetrate_down', 5, 2)->default(0)->comment('降低装备穿甲');
            $table->float('durable_down', 5, 2)->default(0)->comment('降低装备耐久');
            $table->float('armor_down', 5, 2)->default(0)->comment('降低装备装甲');
            $table->float('hit_down', 5, 2)->default(0)->comment('降低装备命中');
            $table->float('dodge_down', 5, 2)->default(0)->comment('降低装备闪避');
            $table->float('concealment_down', 5, 2)->default(0)->comment('降低装备隐蔽');
            $table->float('spy_down', 5, 2)->default(0)->comment('降低装备侦查');
//            $table->foreign('tactic_info_id')->references('id')->on('tactic_infos')->onDelete('cascade');
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
        Schema::dropIfExists('tactics');
    }
}
