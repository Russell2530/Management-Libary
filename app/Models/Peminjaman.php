<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; // ⬅️ Tambahkan ini biar gak pakai default plural-nya Laravel
    protected $fillable = [
        'nama_peminjam',
        'book_id',
        'jumlah_buku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];


    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
