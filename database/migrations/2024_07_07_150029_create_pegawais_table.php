<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Melakukan migrasi yang diperlukan.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('email');
            $table->string('nomor', 20);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
        });
    }

    /**
     * Membatalkan migrasi yang dijalankan.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
