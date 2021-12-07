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
            $table->string('property_name' ,191);
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('property_types_id');
            $table->unsignedBigInteger('governorate_id');
            $table->integer('floor_space');
            $table->integer('number_of_balconies');
            $table->integer('balconies_space');
            $table->integer('number_of_bedrooms');
            $table->integer('number_of_bathrooms');
            $table->integer('number_of_garages');
            $table->integer('number_of_parking_spaces');
            $table->boolean('pets_allowed');
            $table->text('property_description');
            $table->unsignedBigInteger('property_status_id');
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
