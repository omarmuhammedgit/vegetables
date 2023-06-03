<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_customers', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice');
            $table->string('name_product');
            $table->string('quantity');
            $table->decimal('price',10,2);
            $table->decimal('total_befor_tex',10,2);
            $table->decimal('total_after_tex',10,2);
            $table->decimal('discount',10,2);
            $table->decimal('total_tex',10,2);
            $table->date('date');
            $table->foreignId('suppler_id')->constrained('supplers','id')->cascadeOnDelete();
            $table->foreignId('invoice_suppler_id')->constrained('invoice_supplers','id')->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained('customers','id')->cascadeOnDelete();
            $table->string('add_by')->nullable();
            $table->bigInteger('com_code')->nullable();
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
        Schema::dropIfExists('invoice_customers');
    }
}
