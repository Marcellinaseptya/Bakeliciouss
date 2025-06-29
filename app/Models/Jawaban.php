<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban'; 

    protected $fillable = ['pertanyaan_id', 'nama', 'isi'];


    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
