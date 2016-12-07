<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEffectablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('effectables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('effect_id')->comment('特性ID');
            $table->integer('effectable_id')->comment('关联表的字段ID');
            $table->string('effectable_type')->comment('关联表的模型名');
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
        Schema::dropIfExists('effectables');
    }
}
