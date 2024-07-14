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
        Schema::create('devisis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_devisi');
            $table->unsignedBigInteger('anggota_id');
            $table->timestamps();
            // Tambahkan foreign key
            $table->foreign('anggota_id')->references('id')->on('pegawais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devisis');
    }
};
