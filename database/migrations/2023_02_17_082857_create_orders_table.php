<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name');
            $table->string('country');
            $table->string('address');
            $table->string('address2');
            $table->string('town');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->string('email');
            $table->string('order_note');
            $table->tinyInteger('create_account');
            $table->tinyInteger('ship_to_address');
            $table->tinyInteger('cal_shipping');
            $table->tinyInteger('payment_method');
            $table->tinyInteger('last_confirm');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
