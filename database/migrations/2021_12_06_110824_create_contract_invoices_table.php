<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id');
            $table->string('invoice_number' ,191);
            $table->text('issued_by');
            $table->text('issued_to');
            $table->text('invoice_details');
            $table->decimal('invoice_amount',10,2);
            $table->date('billing_date');
            $table->date('paid_at');
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
        Schema::dropIfExists('contract_invoices');
    }
}
