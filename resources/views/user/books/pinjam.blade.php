<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gray-100">
        <div class="max-w-xl mx-auto bg-white shadow-3xl rounded-xl p-10 border-t-8 border-amber-500">
            <h3 class="text-4xl font-extrabold text-gray-900 mb-10 text-center flex items-center justify-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 001 1.732l.334-.334a1 1 0 00.334-1.732V4a4 4 0 00-4-4H6a4 4 0 00-4 4v12a1 1 0 001 1.732l.334-.334A1 1 0 004 16V4zM6 4a2 2 0 012-2h4a2 2 0 012 2v12a2 2 0 01-2 2H8a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M10 16a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
                <span>Konfirmasi Peminjaman</span>
            </h3>

            <form action="{{ route('user.books.store') }}" method="POST" class="space-y-6">
                @csrf

                <input type="hidden" name="book_id" value="{{ $book->id }}">

                <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-200">
                    <label class="block text-sm font-medium text-indigo-800 mb-1">Peminjam</label>
                    <p class="text-lg font-semibold text-indigo-900">{{ Auth::user()->name }}</p>
                    <input type="hidden" name="nama_peminjam" value="{{ Auth::user()->name }}">
                </div>

                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Buku yang Dipinjam</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $book->nama_buku }}</p>
                </div>

                <div>
                    <label for="jumlah_buku" class="block text-sm font-bold text-gray-700 mb-2">Jumlah Buku yang Dipinjam</label>
                    <input type="number" id="jumlah_buku" name="jumlah_buku" min="1" max="{{ $book->jumlah_buku }}" value="1"
                        class="w-full border-gray-300 rounded-xl shadow-lg focus:border-indigo-600 focus:ring-indigo-600 p-4 text-lg transition duration-150 ease-in-out"
                        required>
                    <p class="text-sm text-red-500 mt-2 font-semibold">Stok Tersedia Maksimal: <span class="font-extrabold">{{ $book->jumlah_buku }}</span></p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="tanggal_pinjam" class="block text-sm font-bold text-gray-700 mb-2">Tanggal Pinjam</label>
                        <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ date('Y-m-d') }}"
                            class="w-full border-gray-300 rounded-xl shadow-lg focus:border-indigo-600 focus:ring-indigo-600 p-4 transition duration-150 ease-in-out"
                            required>
                    </div>
                    <div>
                        <label for="tanggal_kembali" class="block text-sm font-bold text-gray-700 mb-2">Tanggal Target Kembali</label>
                        <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                            class="w-full border-gray-300 rounded-xl shadow-lg focus:border-indigo-600 focus:ring-indigo-600 p-4 transition duration-150 ease-in-out"
                            required>
                    </div>
                </div>

                <div class="flex justify-between space-x-4 pt-6">
                    <a href="{{ route('user.books.detail', $book->id) }}"
                        class="flex-1 inline-flex items-center justify-center px-6 py-3 border border-gray-400 shadow-md text-base font-semibold rounded-xl text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none transition duration-200">
                        Batalkan
                    </a>
                    <button type="submit"
                            class="flex-1 inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-xl shadow-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-indigo-500/50 transition duration-300 transform hover:scale-[1.01]">
                        ✅ Konfirmasi & Pinjam
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
