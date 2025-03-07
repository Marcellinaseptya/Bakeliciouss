<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model {
    use HasFactory;

    protected $table = 'produk'; // Nama tabel di database

    protected $primaryKey = 'id_produk'; // Primary key

    protected $fillable = [
        'nama', 'deskripsi', 'harga', 'stok', 'gambar'
    ];

    public function rating() {
        return $this->hasMany(Rating::class, 'id_produk');
    }

    public function transaksi() {
        return $this->belongsToMany(Transaksi::class, 'riwayat_transaksi', 'id_produk', 'id_transaksi');
    }
};