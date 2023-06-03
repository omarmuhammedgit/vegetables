<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_supports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('no_support');
            $table->date('date');
            $table->string('exchange');
            $table->decimal('total',10,2);
            $table->decimal('tex',10,2);
            $table->text('statement')->nullable();
            $table->string('payment');
            $table->string('number_shek');
            $table->string('bank');
            $table->bigInteger('com_code');
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
        Schema::dropIfExists('exchange_supports');
    }
}
