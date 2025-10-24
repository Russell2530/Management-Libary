<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Header with title and action button -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
            <div>
                <h1 class="text-4xl font-extrabold text-white">Kelola Buku</h1>
                <p class="text-slate-400 mt-2">Atur dan kelola koleksi buku perpustakaan Anda</p>
            </div>
            <a href="{{ route('books.create') }}"
                class="inline-flex items-center px-6 py-3 bg-white text-slate-900 font-semibold rounded-xl hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-900 focus:ring-white transition duration-200 shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Buku Baru
            </a>
        </div>

        <!-- Success message -->
        @if(session('success'))
            <div class="glass rounded-xl p-4 mb-8 border border-green-500/30 bg-green-500/10">
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-green-300">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Books table with dark theme -->
        <div class="glass rounded-2xl border border-slate-700/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-700/50">
                    <thead class="bg-white/5">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Nama Buku</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Kategori</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-slate-300 uppercase tracking-wider">Stok</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Cover</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Deskripsi</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-slate-300 uppercase tracking-wider">Aksi</th>
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2 text-center">
                                    <a href="{{ route('books.edit', $book->id) }}"
                                       class="inline-flex items-center px-3 py-1.5 bg-blue-600/20 text-blue-300 font-semibold rounded-lg hover:bg-blue-600/30 transition duration-200 border border-blue-500/30">
                                        Edit
                                    </a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 bg-red-600/20 text-red-300 font-semibold rounded-lg hover:bg-red-600/30 transition duration-200 border border-red-500/30">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-slate-400">
                                    <p class="text-lg">Belum ada buku. Mulai dengan menambahkan buku baru.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
