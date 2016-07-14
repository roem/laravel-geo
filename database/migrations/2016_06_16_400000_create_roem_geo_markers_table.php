<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoemGeoMarkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roem_geo_markers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('map_id')->unsigned()->index();
            $table->string('title');
            $table->string('slug')->index();
            $table->string('label', 1)->nullable();
            $table->double('latitude', 11, 8);
            $table->double('longitude', 11, 8);
            $table->integer('zoom')->nullable();
            $table->boolean('adaptzoom')->default(false);
            $table->boolean('scrollwheel')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('map_id')->references('id')->on('roem_geo_maps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roem_geo_markers');
    }
}
