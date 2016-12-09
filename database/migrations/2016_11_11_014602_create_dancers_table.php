<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dancers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('舞姬姓名');
            $table->string('dance_outfit')->comment('舞装名称');
            $table->string('type')->comment('类型');
            $table->string('country')->comment('国籍');
            $table->integer('rarity')->comment('稀有度');
            $table->string('subjection')->comment('隶属机构');
            $table->string('introduction')->comment('人物介绍');
            $table->string('character')->comment('人物性格');
            $table->integer('grow_fire')->comment('成长火力');
            $table->integer('grow_penetrate')->comment('成长穿甲');
            $table->integer('grow_durable')->comment('成长耐久');
            $table->integer('grow_armor')->comment('成长装甲');
            $table->integer('barbette')->comment('炮座');
            $table->integer('refit')->comment('改装');
            $table->integer('outside')->comment('外身');
            $table->integer('inwall')->comment('内壁');
            $table->integer('inwarehouse')->comment('内仓');
            $table->integer('carriage')->comment('炮架');
            $table->integer('special')->comment('特殊');
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
        Schema::dropIfExists('dancers');
    }
}
