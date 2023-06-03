<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceSupplersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_supplers', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice');
            $table->date('date');
            $table->foreignId('suppler_id')->constrained('supplers','id')->cascadeOnDelete();
            $table->bigInteger('no_support');
            $table->string('serivce_rota');
            $table->string('total_quantity');
            $table->decimal('escort_expenses',10,2);
            $table->decimal('other_expenses',10,2);
            $table->text('statement_expenses')->nullable();
            $table->decimal('total_not_include_tex',10,2);
            $table->decimal('total_include_tex',10,2);
            $table->decimal('total_tex',10,2);
            $table->decimal('total_discount',10,2);
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
        Schema::dropIfExists('invoice_supplers');
    }
}
