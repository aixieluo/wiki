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
            $table->integer('type_id')->unsigned()->comment('类型外键');
            $table->integer('country_id')->unsigned()->comment('国籍外键');
            $table->integer('rarity_id')->unsigned()->comment('稀有度外键');
            $table->string('subjection')->comment('隶属机构');
            $table->string('introduction')->comment('人物介绍');
            $table->string('character')->comment('人物性格');
            $table->double('grow_fire', 8, 2)->comment('成长火力');
            $table->double('grow_penetrate', 8, 2)->comment('成长穿甲');
            $table->double('grow_durable', 8, 2)->comment('成长耐久');
            $table->double('grow_armor', 8, 2)->comment('成长装甲');
            $table->integer('barbette')->comment('炮座');
            $table->integer('refit')->comment('改装');
            $table->integer('outside')->comment('外身');
            $table->integer('inwall')->comment('内壁');
            $table->integer('inwarehouse')->comment('内仓');
            $table->integer('carriage')->comment('炮架');
            $table->integer('special')->comment('特殊');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('rarity_id')->references('id')->on('rarities')->onDelete('cascade');
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
        Schema::dropIfExists('dancers');
    }
}
