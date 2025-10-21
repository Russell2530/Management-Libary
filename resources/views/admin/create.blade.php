<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="max-w-2xl mx-auto bg-white shadow-2xl rounded-2xl p-8 lg:p-10 border-t-8 border-indigo-600">
            <h1 class="text-3xl lg:text-4xl font-extrabold text-indigo-700 mb-8 text-center border-b-2 border-indigo-100 pb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 inline-block -mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Formulir Tambah Buku
            </h1>

            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="nama_buku" class="block text-sm font-semibold text-gray-800 mb-2">Nama Buku</label>
                    <input type="text" id="nama_buku" name="nama_buku" placeholder="Contoh: Belajar Laravel dengan Cepat"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3 transition duration-150 ease-in-out"
                           required>
                </div>

                <div>
                    <label for="kategori" class="block text-sm font-semibold text-gray-800 mb-2">Kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="Contoh: Teknologi, Fiksi, Sains"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3 transition duration-150 ease-in-out"
                           required>
                </div>

                <div>
                    <label for="jumlah_buku" class="block text-sm font-semibold text-gray-800 mb-2">Jumlah Stok</label>
                    <input type="number" id="jumlah_buku" name="jumlah_buku" min="0" placeholder="Masukkan jumlah buku (misal: 10)"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3 transition duration-150 ease-in-out"
                           required>
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-semibold text-gray-800 mb-2">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Jelaskan secara singkat isi buku..."
                              class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3 transition duration-150 ease-in-out"></textarea>
                </div>

                <div>
                    <label for="gambar" class="block text-sm font-semibold text-gray-800 mb-2">Gambar Cover (opsional)</label>
                    <input type="file" id="gambar" name="gambar"
                           class="block w-full text-sm text-gray-600 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 p-1.5 border border-gray-300 rounded-lg cursor-pointer">
                </div>

                <div class="flex justify-end space-x-3 pt-6">
                    <a href="{{ route('admin.dashboard') }}"
                       class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-sm font-semibold rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                        Batal & Kembali
                    </a>
                    <button type="submit"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-semibold rounded-xl shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out transform hover:scale-[1.02]">
                        <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Simpan Buku
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
