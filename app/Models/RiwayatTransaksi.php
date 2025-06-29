<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTransaksi extends Model {
    use HasFactory;

    protected $table = 'riwayat_transaksi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_transaksi', 'id_produk', 'jumlah', 'sub_total'
    ];

    public function transaksi() {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
};