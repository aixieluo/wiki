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
            $table->integer('fire')->comment('火力');
            $table->integer('penetrate')->comment('穿甲');
            $table->integer('durable')->comment('耐久');
            $table->integer('armor')->comment('装甲');
            $table->integer('hit')->comment('命中');
            $table->integer('dodge')->comment('闪避');
            $table->integer('concealment')->comment('隐蔽');
            $table->integer('spy')->comment('侦查');
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
