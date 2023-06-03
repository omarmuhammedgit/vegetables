<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name',500);
            $table->string('address',500);
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('no_recode');
            $table->bigInteger('no_tex');
            $table->string('inv_code')->nullable();
            $table->string('cust_code')->nullable();
            $table->string('sup_code')->nullable();
            $table->string('pro_code')->nullable();
            $table->string('suport_code')->nullable();
            $table->string('catch_code')->nullable();
            $table->string('name_tex')->nullable();
            $table->string('tex_rote')->nullable();
            $table->string('service_rote')->nullable();
            $table->string('custom_fiald_1')->nullable();
            $table->string('custom_fiald_2')->nullable();
            $table->bigInteger('com_code');
            $table->string('added_by');
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
        Schema::dropIfExists('settings');
    }
}
