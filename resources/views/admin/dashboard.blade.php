<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-10 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-indigo-600 mr-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2h3a1 1 0 010 2H5V6zm0 4h7a1 1 0 010 2H5v-2zm0 4h10a1 1 0 010 2H5v-2z" clip-rule="evenodd" />
            </svg>
            Dashboard Admin Perpustakaan
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

            <div class="bg-white overflow-hidden shadow-2xl rounded-xl border-l-8 border-indigo-600 transform transition duration-300 hover:scale-[1.01] hover:shadow-3xl">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-indigo-100 rounded-full p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.409 10.036 5 9 5c-4 0-5 3.125-5 5.25v3.5L4.5 14h15l.5-.25v-3.5C19 8.125 18 5 14 5c-1.036 0-1.832.409-3 1.253z" />
                            </svg>
                        </div>
                        <div class="ml-5">
                            <h5 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Total Buku Tersedia</h5>
                            <h3 class="text-5xl font-extrabold text-gray-900 mt-1">{{ $totalBooks }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-2xl rounded-xl border-l-8 border-green-600 transform transition duration-300 hover:scale-[1.01] hover:shadow-3xl">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-100 rounded-full p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H3v-2a3 3 0 015.356-1.857M9 20v-2m4-4H7m4 0a4 4 0 100-8 4 4 0 000 8zm-2-8a2 2 0 114 0 2 2 0 01-4 0z" />
                            </svg>
                        </div>
                        <div class="ml-5">
                            <h5 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Total Pengguna</h5>
                            <h3 class="text-5xl font-extrabold text-gray-900 mt-1">{{ $totalUsers }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-2xl rounded-xl border-l-8 border-yellow-600 transform transition duration-300 hover:scale-[1.01] hover:shadow-3xl">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-100 rounded-full p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8h12a2 2 0 002-2v-3.483l-4.5-2.25L12 11.217l-1.5 1.5L8 10.5l-4 2V17a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-5">
                            <h5 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Total Transaksi Pinjam</h5>
                            <h3 class="text-5xl font-extrabold text-gray-900 mt-1">{{ $totalPeminjaman }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="text-2xl font-bold text-gray-800 mb-4">📚 Daftar Buku Terbaru</h4>
        <div class="bg-white shadow-xl sm:rounded-lg overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-10">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Buku</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kategori</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider w-20">Stok</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-24">Cover</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Deskripsi Singkat</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($books as $book)
                            <tr class="hover:bg-indigo-50 transition duration-150 ease-in-out">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-bold">{{ $book->nama_buku }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-indigo-600 font-medium">{{ $book->kategori }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-base text-center text-gray-900 font-extrabold">{{ $book->jumlah_buku }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($book->gambar)
                                        <img src="{{ asset('images/' . $book->gambar) }}" alt="{{ $book->nama_buku }}"
                                             class="h-20 w-16 object-cover rounded-lg shadow-md border-2 border-gray-200"
                                             onerror="this.onerror=null;this.src='https://placehold.co/64x80/d1d5db/4b5563?text=No+Img'">
                                    @else
                                        <span class="text-xs text-gray-400 italic">N/A</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 max-w-sm truncate" title="{{ $book->deskripsi }}">
                                    {{ $book->deskripsi }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-xl text-gray-400 font-medium italic bg-gray-50">
                                    Belum ada data buku terbaru untuk ditampilkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
