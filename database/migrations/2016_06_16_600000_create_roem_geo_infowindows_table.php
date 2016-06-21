<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoemGeoInfowindowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roem_geo_infowindows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marker_id')->unsigned()->index();
            $table->string('title');
            $table->string('slug')->index();
            $table->text('description');
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
        Schema::drop('roem_geo_infowindows');
    }
}
