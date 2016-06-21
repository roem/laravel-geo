<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoemGeoIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roem_geo_icons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marker_id')->unsigned()->index();
            $table->double('latitude', 11, 8);
            $table->double('longitude', 11, 8);
            $table->string('coords');
            $table->text('image');
            $table->timestamps();

            $table->foreign('marker_id')->references('id')->on('roem_geo_markers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roem_geo_icons');
    }
}
