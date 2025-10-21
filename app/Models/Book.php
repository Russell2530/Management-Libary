<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_buku',
        'kategori',
        'deskripsi',
        'gambar',
        'jumlah_buku',
    ];

    // Relasi ke Riwayat
    public function riwayats()
    {
        return $this->hasMany(Riwayat::class);
    }
}
