<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    public $timestamps = true;

    protected $fillable = [
        'nama_pelanggan', 'no_hp', 'alamat', 'total', 'status'
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }
}
