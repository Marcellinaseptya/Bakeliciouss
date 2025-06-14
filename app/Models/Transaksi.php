<?php

// app/Models/Transaksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    // protected $primaryKey = 'id_transaksi';
    public $timestamps = true;

    protected $fillable = [
        'nama_pelanggan', 'no_hp', 'alamat', 'total', 'status'
    ];

    // Tambahkan relasi
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }
}
