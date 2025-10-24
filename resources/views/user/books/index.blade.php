<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Header section -->
        <div class="mb-12">
            <h1 class="text-4xl font-extrabold text-white mb-2">Katalog Buku</h1>
            <p class="text-slate-400">Jelajahi koleksi lengkap perpustakaan kami</p>
        </div>

        <!-- Books grid with dark theme -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @forelse ($books as $book)
                <div class="glass rounded-xl border border-slate-700/50 overflow-hidden hover:border-slate-600/80 transition duration-300 group flex flex-col h-full">
                    <!-- Book cover -->
                    <div class="h-48 overflow-hidden bg-white/5">
                        @if($book->gambar)
                            <img src="{{ asset('images/' . $book->gambar) }}" alt="{{ $book->nama_buku }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-300"
                                onerror="this.onerror=null;this.src='https://placehold.co/400x600/334155/94a3b8?text=Cover'">
                        @else
                            <div class="flex items-center justify-center h-full bg-white/10 text-slate-400 font-semibold text-center p-4">
                                <span>Tidak Ada Cover</span>
                            </div>
                        @endif
                    </div>

                    <!-- Book info -->
                    <div class="p-4 flex flex-col flex-grow">
                        <p class="text-xs font-semibold text-slate-400 mb-1 uppercase tracking-wider">{{ $book->kategori }}</p>
                        <h3 class="text-sm font-bold text-white mb-3 line-clamp-2 flex-grow" title="{{ $book->nama_buku }}">
                            {{ $book->nama_buku }}
                        </h3>

                        <!-- Stock info -->
                        <div class="flex items-center justify-between mb-4 py-2 border-t border-slate-700/50">
                            <span class="text-xs text-slate-400">Stok:</span>
                            <span class="font-bold {{ $book->jumlah_buku > 0 ? 'text-white' : 'text-red-400' }}">
                                {{ $book->jumlah_buku }}
                            </span>
                        </div>

                        <!-- Action button -->
                        @if($book->jumlah_buku > 0)
                            <a href="{{ route('user.books.detail', $book->id) }}"
                               class="w-full text-center px-4 py-2 bg-white text-slate-900 font-semibold rounded-lg hover:bg-slate-100 transition duration-200 shadow-lg hover:shadow-xl">
                                Lihat Detail
                            </a>
                        @else
                            <button disabled
                                    class="w-full px-4 py-2 text-sm font-semibold rounded-lg text-slate-400 bg-white/5 cursor-not-allowed border border-slate-700/50">
                                Stok Habis
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="glass rounded-2xl p-12 text-center border border-slate-700/50">
                        <p class="text-xl text-slate-400">Katalog sedang diperbarui. Belum ada buku saat ini.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
