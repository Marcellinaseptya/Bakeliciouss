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
        Schema::create('rating', function (Blueprint $table) {
            $table->bigIncrements('id_rating');
            $table->foreignId('id')->constrained('user')->onDelete('cascade'); // User yang memberikan rating
            $table->bigInteger('id_produk')->unsigned(); 
            $table->tinyInteger('rating')->unsigned()->comment('Rating 1-5'); // Rating dari 1 sampai 5
            $table->text('ulasan')->nullable(); // Ulasan pengguna
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating');
    }
};
