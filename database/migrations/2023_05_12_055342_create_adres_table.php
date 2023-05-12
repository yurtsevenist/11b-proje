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
        Schema::create('adres', function (Blueprint $table) {
            $table->id();
            $table->integer('cid')->comment("Kullanıcı id si");
            $table->string('def')->comment("Adres türü, ev, iş vs");
            $table->string('province')->comment("adres ili");
            $table->string('district')->comment("Adres ilçesi");
            $table->string('address')->comment("Açık adres mah, sok, apt vs");
            $table->string('pc')->nullable()->comment("posta kodu");
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('adres');
    }
};
