<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoemGeoStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roem_geo_styles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('styleable_type')->index();
            $table->integer('styleable_id')->unsigned()->index();
            $table->string('featureType');
            $table->string('elementType')->nullable();
            $table->timestamps();

            $table->index(['styleable_type', 'styleable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roem_geo_styles');
    }
}
