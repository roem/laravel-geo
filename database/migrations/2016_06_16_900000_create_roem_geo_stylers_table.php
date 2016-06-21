<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoemGeoStylersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roem_geo_stylers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('style_id')->unsigned()->index();
            $table->string('key');
            $table->string('value');
            $table->timestamps();

            $table->foreign('style_id')->references('id')->on('roem_geo_styles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roem_geo_stylers');
    }
}
