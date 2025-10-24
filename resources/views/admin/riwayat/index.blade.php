<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-4xl font-extrabold text-white mb-2">Manajemen Peminjaman</h1>
            <p class="text-slate-400">Kelola semua transaksi peminjaman buku</p>
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

        <!-- Borrowing management table with dark theme -->
        <div class="glass rounded-2xl border border-slate-700/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-700/50">
                    <thead class="bg-white/5">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Peminjam</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Judul Buku</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Tgl. Pinjam</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Tgl. Kembali</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-slate-300 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-slate-300 uppercase tracking-wider">Update Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @forelse($riwayats as $item)
                            <tr class="hover:bg-white/5 transition duration-150">
                                <td class="px-6 py-4 text-sm text-slate-400">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm text-white font-semibold">{{ $item->user->name }}</td>
                                <td class="px-6 py-4 text-sm text-slate-300">{{ $item->book->nama_buku }}</td>
                                <td class="px-6 py-4 text-sm text-slate-400">{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-sm text-slate-400">
                                    {{ $item->tanggal_kembali ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') : 'Belum Kembali' }}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    @if($item->status === 'dikembalikan')
                                        <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full bg-green-500/20 text-green-300 border border-green-500/30">Dikembalikan</span>
                                    @elseif($item->status === 'dipinjam')
                                        <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full bg-blue-500/20 text-blue-300 border border-blue-500/30">Dipinjam</span>
                                    @elseif($item->status === 'menunggu konfirmasi')
                                        <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full bg-yellow-500/20 text-yellow-300 border border-yellow-500/30">Menunggu</span>
                                    @elseif($item->status === 'ditolak')
                                        <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full bg-red-500/20 text-red-300 border border-red-500/30">Ditolak</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <form action="{{ route('admin.riwayat.update', $item->id) }}" method="POST" class="inline-flex items-center space-x-2">
                                        @csrf
                                        <select name="status" class="bg-white/10 border border-slate-600/50 rounded-lg px-2 py-1 text-sm text-white focus:ring-2 focus:ring-white/20 focus:border-white transition duration-150">
                                            <option value="menunggu konfirmasi" {{ $item->status == 'menunggu konfirmasi' ? 'selected' : '' }} class="bg-slate-900">Menunggu</option>
                                            <option value="dipinjam" {{ $item->status == 'dipinjam' ? 'selected' : '' }} class="bg-slate-900">Dipinjam</option>
                                            <option value="dikembalikan" {{ $item->status == 'dikembalikan' ? 'selected' : '' }} class="bg-slate-900">Dikembalikan</option>
                                            <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }} class="bg-slate-900">Ditolak</option>
                                        </select>
                                        <button type="submit" class="px-3 py-1 bg-white text-slate-900 text-xs font-semibold rounded-lg hover:bg-slate-100 transition duration-150 shadow-lg">
                                            Update
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-slate-400">
                                    Belum ada data peminjaman yang tercatat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
