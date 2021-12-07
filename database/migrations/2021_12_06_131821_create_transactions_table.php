<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_type_id');
            $table->unsignedBigInteger('client_offered');
            $table->unsignedBigInteger('client_requested');
            $table->text('transaction_details');
            $table->timestamps();

        });



        Schema::table('transactions', function (Blueprint $table) {
            
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types');
            $table->foreign('client_offered')->references('id')->on('clients');
            $table->foreign('client_requested')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
