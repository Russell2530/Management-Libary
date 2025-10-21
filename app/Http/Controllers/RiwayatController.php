<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    // User melihat daftar riwayat peminjaman
    public function index()
    {
        $riwayats = Riwayat::with('book')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.riwayat', compact('riwayats'));
    }

    // User membuat permintaan peminjaman
    public function store(Request $request)
    {
        $book = Book::findOrFail($request->book_id);

        if ($book->jumlah_buku <= 0) {
            return back()->with('error', 'Buku sudah habis!');
        }

        Riwayat::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'status' => 'menunggu konfirmasi',
            'tanggal_pinjam' => now(),
        ]);

        return redirect()->route('user.riwayat')->with('success', 'Permintaan peminjaman dikirim!');
    }

    // Admin melihat semua riwayat
    public function adminIndex()
    {
        $riwayats = Riwayat::with(['user', 'book'])->latest()->get();
        return view('admin.riwayat.index', compact('riwayats'));
    }

    // Admin mengubah status peminjaman
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu konfirmasi,dipinjam,dikembalikan,ditolak',
        ]);

        $riwayat = Riwayat::findOrFail($id);
        $riwayat->update([
            'status' => $request->status,
            'tanggal_kembali' => $request->status === 'dikembalikan' ? now() : null,
        ]);

        // update jumlah buku otomatis
        if ($request->status === 'dipinjam') {
            $riwayat->book->decrement('jumlah_buku');
        } elseif ($request->status === 'dikembalikan') {
            $riwayat->book->increment('jumlah_buku');
        }

        return back()->with('success', 'Status berhasil diperbarui!');
    }
}
