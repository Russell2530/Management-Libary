<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.409 10.036 5 9 5c-4 0-5 3.125-5 5.25v3.5L4.5 14h15l.5-.25v-3.5C19 8.125 18 5 14 5c-1.036 0-1.832.409-3 1.253z" />
                </svg>
                Daftar Buku Perpustakaan
            </h1>
            <a href="{{ route('books.create') }}"
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-semibold rounded-xl shadow-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out transform hover:scale-[1.02]">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Tambah Buku Baru
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg shadow-md mb-8" role="alert">
                <div class="flex items-center">
                    <svg class="h-6 w-6 mr-3 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <span class="font-bold">Aksi Berhasil!</span>
                        <span class="block sm:inline ml-2">{{ session('success') }}</span>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white shadow-2xl sm:rounded-xl overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-indigo-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider w-10">No</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Nama Buku</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Kategori</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-indigo-700 uppercase tracking-wider w-20">Stok</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider w-24">Cover</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Deskripsi Singkat</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-indigo-700 uppercase tracking-wider w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($books as $book)
                            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-base text-gray-900 font-extrabold">{{ $book->nama_buku }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-indigo-600 font-medium">{{ $book->kategori }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-lg text-center text-indigo-800 font-extrabold">{{ $book->jumlah_buku }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($book->gambar)
                                        <img src="{{ asset('images/' . $book->gambar) }}" alt="{{ $book->nama_buku }}"
                                             class="h-16 w-12 object-cover rounded-md shadow-md border-2 border-gray-200"
                                             onerror="this.onerror=null;this.src='https://placehold.co/48x64/d1d5db/4b5563?text=No+Img'">
                                    @else
                                        <span class="text-xs text-gray-400 italic">Tidak Ada</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 max-w-sm truncate" title="{{ $book->deskripsi }}">{{ $book->deskripsi }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-1.5 text-center">
                                    <a href="{{ route('books.edit', $book->id) }}"
                                       class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-semibold rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none transition duration-150 ease-in-out shadow-md">
                                        Edit
                                    </a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin mau HAPUS buku {{ $book->nama_buku }} secara permanen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-semibold rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none transition duration-150 ease-in-out shadow-md">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="px-6 py-10 text-center text-lg text-gray-500 italic bg-gray-50">Oops! Data buku masih kosong. Silakan tambahkan buku baru.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
