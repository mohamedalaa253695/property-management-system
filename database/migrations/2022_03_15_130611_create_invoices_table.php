<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedDouble('invoice_number');
            $table->string('description');
            $table->integer('qty');
            $table->unsignedDouble('price');
            $table->unsignedDouble('total');
            $table->date('issue_date');
            $table->date('due_date');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_address');
            $table->string('customer_phone');
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
