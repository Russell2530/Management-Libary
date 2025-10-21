<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'nama_buku' => 'required',
            'kategori' => 'required',
            'jumlah_buku' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg',
            'deskripsi' => 'nullable',
        ]);

        // Upload gambar kalau ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $validated['gambar'] = $fileName;
        }

        Book::create($validated);

        return redirect()->route('admin.books')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit(Book $book)
    {
        return view('admin.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'nama_buku' => 'required',
            'kategori' => 'required',
            'jumlah_buku' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg',
            'deskripsi' => 'nullable',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $validated['gambar'] = $fileName;
        }

        $book->update($validated);

        return redirect()->route('admin.books')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books')->with('success', 'Buku berhasil dihapus!');
    }
}
