<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoemGeoMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roem_geo_maps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mapable_type')->index();
            $table->integer('mapable_id')->unsigned()->index();
            $table->string('type')->index();
            $table->double('latitude', 11, 8);
            $table->double('longitude', 11, 8);
            $table->integer('zoom');
            $table->boolean('adaptzoom')->default(false);
            $table->boolean('scrollwheel')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['mapable_type', 'mapable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roem_geo_maps');
    }
}
