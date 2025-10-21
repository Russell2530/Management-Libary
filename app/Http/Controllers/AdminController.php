<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Peminjaman;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Data ringkasan
        $totalBooks = Book::count();
        $totalUsers = User::count();
        $totalPeminjaman = Peminjaman::count();

        // Ambil list buku untuk ditampilkan di bawah
        $books = Book::latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalUsers',
            'totalPeminjaman',
            'books'
        ));
    }
}
