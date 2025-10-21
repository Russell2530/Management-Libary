<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto bg-white shadow-2xl rounded-2xl overflow-hidden border-t-8 border-indigo-600">
            <div class="p-8 md:p-12">
                <div class="flex flex-col md:flex-row gap-10">
                    <div class="flex-shrink-0 w-full md:w-1/3">
                        @if ($book->gambar)
                            <img src="{{ url('images/' . $book->gambar) }}" alt="{{ $book->nama_buku }}"
                                class="rounded-xl shadow-2xl w-full object-cover transform hover:scale-[1.02] transition duration-500 border-4 border-gray-100">
                        @else
                            <div class="bg-indigo-100 rounded-xl flex items-center justify-center h-80 shadow-inner border border-indigo-200">
                                <span class="text-indigo-600 font-semibold text-xl italic">🖼️ No Cover Image</span>
                            </div>
                        @endif
                    </div>

                    <div class="flex-1 space-y-6">
                        <span class="inline-block bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-md">
                            {{ $book->kategori }}
                        </span>

                        <h2 class="text-4xl font-extrabold text-gray-900 leading-tight">{{ $book->nama_buku }}</h2>

                        <div class="text-gray-700 leading-relaxed text-lg border-l-4 border-amber-400 pl-4 py-2">
                            @if (!empty($book->deskripsi))
                                <p>{{ Str::limit($book->deskripsi, 300, '...') }}</p> {{-- Batasi deskripsi agar tidak terlalu panjang --}}
                            @else
                                <p class="italic text-gray-500">Deskripsi buku ini belum tersedia.</p>
                            @endif
                        </div>

                        <div class="flex items-center space-x-4 pt-4">
                            <div class="flex items-center space-x-2 text-xl font-bold">
                                <span class="text-gray-500">Stok:</span>
                                <span class="text-2xl {{ $book->jumlah_buku > 0 ? 'text-green-600' : 'text-red-500' }}">
                                    {{ $book->jumlah_buku }}
                                </span>
                                <span class="text-gray-500">tersedia</span>
                            </div>
                        </div>

                        <div class="pt-6 flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                            <a href="{{ route('user.books') }}"
                               class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 shadow-sm text-base font-semibold rounded-xl text-gray-700 bg-white hover:bg-gray-100 transition duration-200">
                                ← Kembali ke Katalog
                            </a>

                            @if ($book->jumlah_buku > 0)
                                <a href="{{ route('user.books.pinjam', $book->id) }}"
                                   class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-xl shadow-lg text-white bg-indigo-600 hover:bg-indigo-700 transform hover:scale-[1.01] transition duration-300">
                                    📚 Ajukan Peminjaman
                                </a>
                            @else
                                <button disabled
                                        class="inline-flex items-center justify-center px-8 py-3 text-base font-bold rounded-xl shadow-md bg-red-400 text-white cursor-not-allowed">
                                    Buku Habis (Stok 0)
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
