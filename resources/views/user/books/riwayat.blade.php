<x-app-layout>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <h3 class="text-4xl font-extrabold text-gray-900 mb-10 text-center flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-amber-500 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" /><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
            </svg>
            Riwayat Peminjaman Saya ⏳
        </h3>

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 mb-8 rounded-lg shadow-md" role="alert">
                <p class="font-bold">Aksi Berhasil!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white shadow-2xl rounded-xl overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-indigo-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Cover</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Nama Buku</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Tgl. Pinjam</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Tgl. Kembali</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($riwayats as $item)
                        <tr class="hover:bg-indigo-50 transition duration-150 ease-in-out">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-indigo-600">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($item->book && $item->book->gambar)
                                    <img src="{{ asset('images/' . $item->book->gambar) }}" alt="{{ $item->book->nama_buku }}"
                                        class="h-16 w-12 object-cover rounded shadow-md border border-gray-200"
                                        onerror="this.onerror=null;this.src='https://placehold.co/400x600/e0e7ff/374151?text=No%20Cover'">
                                @else
                                    <div class="h-16 w-12 bg-gray-200 rounded-md flex items-center justify-center text-xs text-gray-500 p-1 shadow-inner">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">{{ $item->book->nama_buku }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->translatedFormat('d M Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('d M Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusClass = [
                                        'Dikembalikan' => 'bg-green-100 text-green-700',
                                        'Selesai' => 'bg-green-100 text-green-700',
                                        'Dipinjam' => 'bg-indigo-100 text-indigo-700',
                                        'Terlambat' => 'bg-red-100 text-red-700',
                                    ];
                                    $currentStatus = $item->status ?? 'Menunggu Konfirmasi';
                                    $badgeClass = $statusClass[$currentStatus] ?? 'bg-yellow-100 text-yellow-700';
                                @endphp
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $badgeClass }} shadow-sm">
                                    {{ $currentStatus }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-20 text-center text-xl text-gray-500 font-medium italic bg-gray-50">
                                Belum ada riwayat peminjaman buku yang tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
