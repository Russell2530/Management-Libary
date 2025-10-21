<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('user.books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('user.books.detail', compact('book'));
    }

    public function create($id)
    {
        $book = Book::findOrFail($id);
        return view('user.books.pinjam', compact('book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam'   => 'required|string|max:255',
            'book_id'         => 'required|exists:books,id',
            'jumlah_buku'     => 'required|integer|min:1',
            'tanggal_pinjam'  => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->jumlah_buku < $request->jumlah_buku) {
            return back()->with('error', 'Jumlah buku tidak mencukupi!');
        }

        Riwayat::create([
            'user_id'         => Auth::id(),
            'book_id'         => $book->id,
            'status'          => 'menunggu konfirmasi',
            'tanggal_pinjam'  => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect()->route('user.riwayat')->with('success', 'Peminjaman berhasil diajukan! Tunggu konfirmasi admin.');
    }

    public function riwayat()
    {
        $riwayats = Riwayat::with('book')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.books.riwayat', compact('riwayats'));
    }
}
