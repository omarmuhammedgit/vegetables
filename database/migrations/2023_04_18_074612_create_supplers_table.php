<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('address')->nullable();
            $table->string('phone');
            $table->string('commercial_record')->nullable();
            $table->string('Tex_number')->nullable();
            $table->string('name_of_deficience')->nullable();
            $table->string('phone_deficince')->nullable();
            $table->string('service_ratio')->nullable();
            $table->string('tex_ratio')->nullable();
            $table->string('custom_field_1')->nullable();
            $table->string('custom_field_2')->nullable();
            $table->string('custom_field_3')->nullable();
            $table->bigInteger('com_code')->nullable();
            $table->date('date');
            $table->integer('add_by')->nullable();
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
        Schema::dropIfExists('supplers');
    }
}
