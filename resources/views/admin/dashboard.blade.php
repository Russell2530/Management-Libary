<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <!-- Updated header with dark theme styling -->
        <div class="mb-10">
            <h1 class="text-4xl font-extrabold text-white mb-2">Dashboard Admin</h1>
            <p class="text-slate-400">Selamat datang, <span class="text-white font-semibold">{{ Auth::user()->name }}</span></p>
        </div>

        <!-- Redesigned stat cards with glassmorphism and dark theme -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Total Books Card -->
            <div class="glass rounded-2xl p-6 border border-slate-700/50 hover:border-slate-600/80 transition duration-300 group">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-slate-400 text-sm font-medium mb-2">Total Buku Tersedia</p>
                        <h3 class="text-4xl font-bold text-white">{{ $totalBooks }}</h3>
                    </div>
                    <div class="p-3 bg-white/10 rounded-xl group-hover:bg-white/20 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.409 10.036 5 9 5c-4 0-5 3.125-5 5.25v3.5L4.5 14h15l.5-.25v-3.5C19 8.125 18 5 14 5c-1.036 0-1.832.409-3 1.253z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Users Card -->
            <div class="glass rounded-2xl p-6 border border-slate-700/50 hover:border-slate-600/80 transition duration-300 group">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-slate-400 text-sm font-medium mb-2">Total Pengguna</p>
                        <h3 class="text-4xl font-bold text-white">{{ $totalUsers }}</h3>
                    </div>
                    <div class="p-3 bg-white/10 rounded-xl group-hover:bg-white/20 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H3v-2a3 3 0 015.356-1.857M9 20v-2m4-4H7m4 0a4 4 0 100-8 4 4 0 000 8zm-2-8a2 2 0 114 0 2 2 0 01-4 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Transactions Card -->
            <div class="glass rounded-2xl p-6 border border-slate-700/50 hover:border-slate-600/80 transition duration-300 group">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-slate-400 text-sm font-medium mb-2">Total Transaksi Pinjam</p>
                        <h3 class="text-4xl font-bold text-white">{{ $totalPeminjaman }}</h3>
                    </div>
                    <div class="p-3 bg-white/10 rounded-xl group-hover:bg-white/20 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8h12a2 2 0 002-2v-3.483l-4.5-2.25L12 11.217l-1.5 1.5L8 10.5l-4 2V17a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Redesigned recent books table with dark theme -->
        <div class="glass rounded-2xl border border-slate-700/50 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-700/50">
                <h2 class="text-xl font-bold text-white">Buku Terbaru</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-700/50">
                    <thead class="bg-white/5">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Nama Buku</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Kategori</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-semibold text-slate-300 uppercase tracking-wider">Stok</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Cover</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @forelse($books as $book)
                            <tr class="hover:bg-white/5 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-400">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white font-semibold">{{ $book->nama_buku }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">{{ $book->kategori }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-white/10 text-white">
                                        {{ $book->jumlah_buku }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($book->gambar)
                                        <img src="{{ asset('images/' . $book->gambar) }}" alt="{{ $book->nama_buku }}"
                                             class="h-12 w-10 object-cover rounded-lg border border-slate-600/50"
                                             onerror="this.onerror=null;this.src='https://placehold.co/40x48/334155/94a3b8?text=No+Img'">
                                    @else
                                        <span class="text-xs text-slate-500">N/A</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-400 max-w-sm truncate" title="{{ $book->deskripsi }}">
                                    {{ $book->deskripsi }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-slate-400">
                                    Belum ada data buku untuk ditampilkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
