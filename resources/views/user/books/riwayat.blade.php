<x-app-layout>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-10">
            <h3 class="text-4xl font-extrabold text-white mb-2">Riwayat Peminjaman Saya</h3>
            <p class="text-slate-400">Lihat semua riwayat peminjaman buku Anda</p>
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

        <!-- History table with dark theme -->
        <div class="glass rounded-2xl border border-slate-700/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-700/50">
                    <thead class="bg-white/5">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Cover</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Nama Buku</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Tgl. Pinjam</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Tgl. Kembali</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @forelse($riwayats as $item)
                            <tr class="hover:bg-white/5 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-400">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($item->book && $item->book->gambar)
                                        <img src="{{ asset('images/' . $item->book->gambar) }}" alt="{{ $item->book->nama_buku }}"
                                            class="h-12 w-10 object-cover rounded border border-slate-600/50"
                                            onerror="this.onerror=null;this.src='https://placehold.co/40x48/334155/94a3b8?text=No+Img'">
                                    @else
                                        <div class="h-12 w-10 bg-white/5 rounded flex items-center justify-center text-xs text-slate-500">
                                            N/A
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white font-semibold">{{ $item->book->nama_buku }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->translatedFormat('d M Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">{{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('d M Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $statusClass = [
                                            'Dikembalikan' => 'bg-green-500/20 text-green-300 border-green-500/30',
                                            'Selesai' => 'bg-green-500/20 text-green-300 border-green-500/30',
                                            'Dipinjam' => 'bg-blue-500/20 text-blue-300 border-blue-500/30',
                                            'Terlambat' => 'bg-red-500/20 text-red-300 border-red-500/30',
                                        ];
                                        $currentStatus = $item->status ?? 'Menunggu Konfirmasi';
                                        $badgeClass = $statusClass[$currentStatus] ?? 'bg-yellow-500/20 text-yellow-300 border-yellow-500/30';
                                    @endphp
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $badgeClass }} border">
                                        {{ $currentStatus }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                    Belum ada riwayat peminjaman buku yang tercatat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
