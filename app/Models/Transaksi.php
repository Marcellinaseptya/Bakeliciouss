<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model {
    use HasFactory;

    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'user_id', 'total_harga', 'status', 'tanggal_transaksi'
    ];

    public function riwayatTransaksi() {
        return $this->hasMany(RiwayatTransaksi::class, 'id_transaksi');
    }

    public function produk() {
        return $this->belongsToMany(Produk::class, 'riwayat_transaksi', 'id_transaksi', 'id_produk');
    }
};
