<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan'; 

    protected $fillable = [
        'nama',
        'judul',
        'isi',
    ];

    public function jawabans()
    {
        return $this->hasMany(Jawaban::class, 'pertanyaan_id');
    }

}
