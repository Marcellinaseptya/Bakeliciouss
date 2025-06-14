<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan'; // <- pastikan ini sesuai nama tabel di database

    protected $fillable = [
        'nama',
        'judul',
        'isi',
    ];

    // app/Models/Pertanyaan.php
public function jawabans()
{
    return $this->hasMany(Jawaban::class, 'pertanyaan_id');
}

}
