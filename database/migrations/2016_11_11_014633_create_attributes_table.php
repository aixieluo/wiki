<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attributeable_id')->unsigned();
            $table->string('attributeable_type');
            $table->double('fire',6,1)->comment('火力');
            $table->double('penetrate',6,1)->comment('穿甲');
            $table->double('durable',6,1)->comment('耐久');
            $table->double('armor',6,1)->comment('装甲');
            $table->double('hit',6,1)->comment('命中');
            $table->double('dodge',6,1)->comment('闪避');
            $table->double('concealment',6,1)->comment('隐蔽');
            $table->double('spy',6,1)->comment('侦查');
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
        Schema::dropIfExists('attributes');
    }
}
