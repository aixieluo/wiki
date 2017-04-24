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
            $table->integer('technology_categorie_id')->unsigned()->comment('科技类别外键');
            $table->string('type')->comment('科技类型');
            $table->foreign('technology_categorie_id')->references('id')->on('technology_categories')->onDelete('cascade');
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
