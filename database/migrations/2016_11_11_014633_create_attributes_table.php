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
            $table->double('fire', 8, 2)->comment('火力');
            $table->double('penetrate', 8, 2)->comment('穿甲');
            $table->double('durable', 8, 2)->comment('耐久');
            $table->double('armor', 8, 2)->comment('装甲');
            $table->double('hit', 8, 2)->comment('命中');
            $table->double('dodge', 8, 2)->comment('闪避');
            $table->double('concealment', 8, 2)->comment('隐蔽');
            $table->double('spy', 8, 2)->comment('侦查');
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
        Schema::dropIfExists('attributes');
    }
}
