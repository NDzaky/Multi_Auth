<?php
// database/migrations/create_devisi_pegawai_table.php

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
        Schema::create('devisi_pegawai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('devisi_id');
            $table->unsignedBigInteger('pegawai_id');
            $table->timestamps();

            $table->foreign('devisi_id')->references('id')->on('devisis')->onDelete('cascade');
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devisi_pegawai');
    }
};
