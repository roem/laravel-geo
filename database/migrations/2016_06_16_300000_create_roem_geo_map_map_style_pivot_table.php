<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoemGeoMapMapStylePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roem_geo_map_map_style', function (Blueprint $table) {
            $table->integer('map_id')->unsigned()->index();
            $table->foreign('map_id')->references('id')->on('roem_geo_maps')->onDelete('cascade');
            $table->integer('map_style_id')->unsigned()->index();
            $table->foreign('map_style_id')->references('id')->on('roem_geo_map_styles')->onDelete('cascade');
            $table->timestamps();

            $table->primary(['map_id', 'map_style_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roem_geo_map_map_style');
    }
}
