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
        Schema::create('riwayat_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade'); // Relasi ke tabel transaksi
            $table->enum('status', ['pending', 'diproses', 'dikirim', 'selesai', 'dibatalkan']); // Status perubahan
            $table->timestamp('waktu_perubahan')->useCurrent(); // Waktu perubahan status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_transaksi');
    }
};
