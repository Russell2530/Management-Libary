<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-8 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
            </svg>
            Manajemen Peminjaman
        </h1>

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 mb-8 rounded-lg shadow-md" role="alert">
                <p class="font-bold">Berhasil!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white shadow-2xl sm:rounded-xl overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-indigo-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider w-12">No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Peminjam</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Judul Buku</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Tgl. Pinjam</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Tgl. Kembali</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-indigo-700 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-indigo-700 uppercase tracking-wider w-48">Update Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($riwayats as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 font-semibold">{{ $item->user->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $item->book->nama_buku }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $item->tanggal_kembali ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') : 'Belum Kembali' }}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    @if($item->status === 'dikembalikan')
                                        <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full bg-green-100 text-green-700 shadow-sm">{{ ucfirst($item->status) }}</span>
                                    @elseif($item->status === 'dipinjam')
                                        <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full bg-indigo-100 text-indigo-700 shadow-sm">{{ ucfirst($item->status) }}</span>
                                    @elseif($item->status === 'menunggu konfirmasi')
                                        <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full bg-yellow-100 text-yellow-700 shadow-sm">{{ ucfirst($item->status) }}</span>
                                    @elseif($item->status === 'ditolak')
                                        <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full bg-red-100 text-red-700 shadow-sm">{{ ucfirst($item->status) }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <form action="{{ route('admin.riwayat.update', $item->id) }}" method="POST" class="inline-flex items-center space-x-2">
                                        @csrf
                                        <select name="status" class="border-gray-300 rounded-lg px-2 py-1 text-sm focus:ring-indigo-500 focus:border-indigo-500 shadow-sm">
                                            <option value="menunggu konfirmasi" {{ $item->status == 'menunggu konfirmasi' ? 'selected' : '' }}>Menunggu</option>
                                            <option value="dipinjam" {{ $item->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                            <option value="dikembalikan" {{ $item->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                                            <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                        </select>
                                        <button type="submit" class="px-3 py-1 bg-indigo-600 text-white text-xs font-semibold rounded-lg hover:bg-indigo-700 shadow-md transition duration-150 ease-in-out">
                                            Update
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-xl text-gray-400 font-medium italic bg-gray-50">
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
