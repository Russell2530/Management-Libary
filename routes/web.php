<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RiwayatController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard user (siswa)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard admin → statistik, ringkasan, dsb.
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])
        ->name('admin.dashboard');
    Route::get('/admin/riwayat', [RiwayatController::class, 'adminIndex'])->name('admin.riwayat');
    Route::post('/admin/riwayat/{id}/status', [RiwayatController::class, 'updateStatus'])->name('admin.riwayat.update');

    // Daftar buku (CRUD)
    Route::get('/admin', [BookController::class, 'index'])->name('admin.books');
    Route::resource('books', BookController::class);
});


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/books', [PeminjamanController::class, 'index'])->name('user.books');
    Route::get('/books/{id}/detail', [PeminjamanController::class, 'show'])->name('user.books.detail'); // 👈 detail buku
    Route::get('/books/pinjam/{id}', [PeminjamanController::class, 'create'])->name('user.books.pinjam');
    Route::post('/books/pinjam', [PeminjamanController::class, 'store'])->name('user.books.store');
    Route::get('/riwayat', [PeminjamanController::class, 'riwayat'])->name('user.riwayat');
    Route::post('/pinjam', [RiwayatController::class, 'store'])->name('user.pinjam');
   
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
