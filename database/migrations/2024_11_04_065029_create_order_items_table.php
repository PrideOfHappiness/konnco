<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idOrder')->unsigned();
            $table->bigInteger(column: 'productID')->unsigned();
            $table->integer('hargaPesan');
            $table->integer('qty');
            $table->timestamps();

            $table->foreign('idOrder')->references('id')->on('order');
            $table->foreign('productID')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
