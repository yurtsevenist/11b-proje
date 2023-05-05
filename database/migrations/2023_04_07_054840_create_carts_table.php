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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('ocode')->default("notyet");
            $table->integer('cid')->comment("Müşteri id si");
            $table->integer('pid')->comment("Ürün id si");
            $table->string('size')->nullable()->comment("ürünün bedeni");
            $table->integer('number')->default(0)->comment("Ürün adedi");
            $table->double('tprice')->default(0)->comment("ürün toplam adedi");
            $table->timestamps();
            $table->foreign('cid')
            ->references('id')
            ->on('users')->onDelete('cascade');
            $table->foreign('pid')
            ->references('id')
            ->on('products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
