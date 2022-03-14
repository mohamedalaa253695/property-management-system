<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePropertiesAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('properties', function (Blueprint $table) {
            // $table->foreign('property_types_id')->references('id')->on('property_types');
            // $table->foreign('property_status_id')->references('id')->on('property_status');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('governorate_id')->references('id')->on('governorates');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('complex_id')->references('id')->on('complexes');
            $table->foreign('building_id')->references('id')->on('buildings');
            $table->foreign('status_id')->references('id')->on('property_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
