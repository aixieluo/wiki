<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('technology_type_id')->unsigned()->comment('科技类型外键');
            $table->string('name')->comment('科技名称');
            $table->integer('rank')->comment('阶级');
            $table->integer('row')->comment('实际行数');
            $table->integer('column')->comment('实际列数');
            $table->string('place')->comment('科技树位置');
//            $table->foreign('technology_type_id')->references('id')->on('technology_types')->onDelete('cascade');
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
        Schema::dropIfExists('technologies');
    }
}
