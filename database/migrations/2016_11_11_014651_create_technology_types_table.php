<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnologyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technology_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('technology_category_id')->unsigned()->comment('科技类别外键');
            $table->string('name')->comment('科技类型名称');
            $table->integer('amount1')->defalut(0)->comment('一级科技大件总数目');
            $table->integer('amount2')->defalut(0)->comment('二级科技大件总数目');
            $table->integer('amount3')->defalut(0)->comment('三级科技大件总数目');
//            $table->foreign('technology_category_id')->references('id')->on('technology_categories')->onDelete('cascade');
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
        Schema::dropIfExists('technology_types');
    }
}
