<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk'; // Kalau nama tabel kamu memang "produk", ini oke
    protected $primaryKey = 'id_produk'; // Pastikan di database memang pakai ini

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'kategori', // Tambahkan ini
        'gambar',
    ];

    // Opsional: casting (bisa bantu saat akses angka)
    protected $casts = [
        'harga' => 'integer',
        'stok' => 'integer',
    ];

    // Relasi ke Rating
    public function rating()
    {
        return $this->hasMany(Rating::class, 'id_produk');
    }

    // Relasi ke Transaksi melalui tabel pivot "riwayat_transaksi"
    public function transaksi()
    {
        return $this->belongsToMany(
            Transaksi::class,
            'riwayat_transaksi',
            'id_produk',
            'id_transaksi'
        );
    }
}
