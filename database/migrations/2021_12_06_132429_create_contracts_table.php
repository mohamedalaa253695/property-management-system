<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contract_type_id');
            $table->unsignedBigInteger('payment_frequency_id');
            $table->unsignedBigInteger('transaction_id');
            $table->text('contract_details');
            $table->decimal('payment_amount' ,10,2);
            $table->decimal('fee_precentage' ,5,2);
            $table->decimal('fee_amount' ,10,2);
            $table->date('date_signed');
            $table->date('start_date');
            $table->date('end_date');


            $table->timestamps();
        });

        Schema::table('contracts', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('contract_type_id')->references('id')->on('contract_types');
            $table->foreign('payment_frequency_id')->references('id')->on('payment_frequencies');
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
