<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Book detail container with glassmorphism -->
        <div class="glass rounded-2xl border border-slate-700/50 overflow-hidden">
            <div class="p-8 md:p-12">
                <div class="flex flex-col md:flex-row gap-10">
                    <!-- Book cover -->
                    <div class="flex-shrink-0 w-full md:w-1/3">
                        @if ($book->gambar)
                            <img src="{{ url('images/' . $book->gambar) }}" alt="{{ $book->nama_buku }}"
                                class="rounded-xl w-full object-cover shadow-2xl border border-slate-600/50 hover:scale-105 transition duration-300">
                        @else
                            <div class="bg-white/10 rounded-xl flex items-center justify-center h-80 border border-slate-600/50">
                                <span class="text-slate-400 font-semibold text-lg">No Cover Image</span>
                            </div>
                        @endif
                    </div>

                    <!-- Book info -->
                    <div class="flex-1 space-y-6">
                        <!-- Category badge -->
                        <span class="inline-block bg-white text-slate-900 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider shadow-lg">
                            {{ $book->kategori }}
                        </span>

                        <!-- Title -->
                        <h2 class="text-4xl font-extrabold text-white leading-tight">{{ $book->nama_buku }}</h2>

                        <!-- Description -->
                        <div class="text-slate-300 leading-relaxed text-base border-l-4 border-white/20 pl-4 py-2">
                            @if (!empty($book->deskripsi))
                                <p>{{ Str::limit($book->deskripsi, 300, '...') }}</p>
                            @else
                                <p class="italic text-slate-500">Deskripsi buku ini belum tersedia.</p>
                            @endif
                        </div>

                        <!-- Stock info -->
                        <div class="flex items-center space-x-4 pt-4 bg-white/5 rounded-lg p-4 border border-slate-700/50">
                            <span class="text-slate-400">Stok Tersedia:</span>
                            <span class="text-3xl font-bold {{ $book->jumlah_buku > 0 ? 'text-white' : 'text-red-400' }}">
                                {{ $book->jumlah_buku }}
                            </span>
                        </div>

                        <!-- Action buttons -->
                        <div class="pt-6 flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                            <a href="{{ route('user.books') }}"
                               class="inline-flex items-center justify-center px-6 py-3 border border-slate-600 text-base font-semibold rounded-lg text-slate-300 bg-white/5 hover:bg-white/10 transition duration-200">
                                Kembali ke Katalog
                            </a>

                            @if ($book->jumlah_buku > 0)
                                <a href="{{ route('user.books.pinjam', $book->id) }}"
                                   class="inline-flex items-center justify-center px-8 py-3 bg-white text-slate-900 font-bold rounded-lg hover:bg-slate-100 transition duration-200 shadow-lg hover:shadow-xl">
                                    Ajukan Peminjaman
                                </a>
                            @else
                                <button disabled
                                        class="inline-flex items-center justify-center px-8 py-3 text-base font-bold rounded-lg bg-red-600/20 text-red-300 cursor-not-allowed border border-red-500/30">
                                    Stok Habis
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
