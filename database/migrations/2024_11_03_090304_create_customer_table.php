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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userID')->unsigned();
            $table->string('name');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->string('no_telp');
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users');
        });

        Schema::create('seller', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userID')->unsigned();
            $table->string('name');
            $table->string('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->string('no_telp');
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
        Schema::dropIfExists('seller');
    }
};
