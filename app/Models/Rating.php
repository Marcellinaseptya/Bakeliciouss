<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model {
    use HasFactory;

    protected $table = 'rating';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'id_produk', 'rating', 'ulasan'
    ];

    public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
};
