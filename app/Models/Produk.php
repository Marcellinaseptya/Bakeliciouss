<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk'; 
    protected $primaryKey = 'id_produk'; 

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'kategori', 
        'gambar',
    ];

    protected $casts = [
        'harga' => 'integer',
        'stok' => 'integer',
    ];

    public function rating()
    {
        return $this->hasMany(Rating::class, 'id_produk');
    }

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
