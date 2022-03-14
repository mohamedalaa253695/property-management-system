<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('number', 191);
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('governorate_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('complex_id');
            $table->unsignedBigInteger('building_id');
            $table->unsignedBigInteger('status_id');
            // $table->unsignedBigInteger('property_types_id');
            $table->float('price');
            $table->string('image')->nullable();
            // $table->integer('floor_space')->default(80);
            $table->integer('number_of_balconies')->default(0);
            $table->integer('balconies_space')->default(1);
            $table->integer('number_of_bedrooms')->default(2);
            $table->integer('number_of_bathrooms')->default(1);
            // $table->integer('number_of_garages')->default(0);
            // $table->integer('number_of_parking_spaces')->default(1);
            $table->integer('total_space')->default(1);
            $table->text('property_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
