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
            $table->id();
            $table->string('ocode')->unique()->comment("spariş numarası");
            $table->integer('cid')->comment("Müşteri id si");
            $table->date('order_date')->comment("sipariş tarihi");
            $table->double('cargo')->default(0);
            $table->integer('paymethod')->default(0)->comment("0 ise kapıda ödeme, 1 ise havale, 2 ise kk, 3 ise coin");
            $table->integer('status')->default(0)->comment("0 ise hazırlanıyor, 1 ise kargoya verildi, 2 ise teslim edildi, -1 iptal, -2 iade");
            $table->date('delivery');
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
        Schema::dropIfExists('orders');
    }
};
