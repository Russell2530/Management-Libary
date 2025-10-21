<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10 bg-gray-50">
        <h2 class="text-5xl font-extrabold text-gray-900 mb-10 text-center tracking-tight">
            <span class="text-indigo-600">Jelajahi</span> Koleksi Perpustakaan 📚
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-6"> {{-- Grid lebih padat --}}
            @forelse ($books as $book)
                <div class="bg-white rounded-xl shadow-2xl overflow-hidden transform hover:scale-[1.05] transition duration-300 ease-in-out border-b-4 border-amber-500 hover:border-indigo-600 group">
                    <div class="h-48 overflow-hidden">
                        @if($book->gambar)
                            <img src="{{ asset('images/' . $book->gambar) }}" alt="{{ $book->nama_buku }}"
                                class="w-full h-full object-cover group-hover:opacity-80 transition duration-300"
                                onerror="this.onerror=null;this.src='https://placehold.co/400x600/e0e7ff/374151?text=Cover%20Buku'">
                        @else
                            <div class="flex items-center justify-center h-full bg-indigo-100 text-indigo-700 font-bold text-center p-4">
                                <span>Tidak Ada Cover</span>
                            </div>
                        @endif
                    </div>

                    <div class="p-4 flex flex-col h-auto">
                        <div>
                            <p class="text-xs font-semibold text-amber-600 mb-1">{{ $book->kategori }}</p>
                            <h3 class="text-lg font-extrabold text-gray-900 mb-3 line-clamp-2" title="{{ $book->nama_buku }}">{{ $book->nama_buku }}</h3>

                            <div class="text-sm flex items-center justify-between mt-1 mb-4">
                                <span class="font-medium text-gray-600">Stok:</span>
                                <span class="font-black text-xl {{ $book->jumlah_buku > 0 ? 'text-indigo-600' : 'text-red-500' }}">
                                    {{ $book->jumlah_buku }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-auto">
                            @if($book->jumlah_buku > 0)
                                <a href="{{ route('user.books.detail', $book->id) }}"
                                class="block w-full text-center px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 shadow-md transition duration-200">
                                    Lihat Detail
                                </a>
                            @else
                                <button disabled
                                        class="w-full inline-flex justify-center items-center px-4 py-2 text-sm font-semibold rounded-lg shadow-sm text-white bg-gray-400 cursor-not-allowed">
                                    Stok Habis
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 bg-white rounded-xl shadow-xl">
                    <p class="text-2xl text-indigo-400 font-medium">✨ Katalog sedang diperbarui. Belum ada buku saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
