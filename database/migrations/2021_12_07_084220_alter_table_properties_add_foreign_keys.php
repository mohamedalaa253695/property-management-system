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
            $table->foreign('property_types_id')->references('id')->on('property_types');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('property_status_id')->references('id')->on('property_status');
            $table->foreign('governorate_id')->references('id')->on('governorates');
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











