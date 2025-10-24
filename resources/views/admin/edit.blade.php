<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="max-w-2xl mx-auto">
            <!-- Form container with glassmorphism -->
            <div class="glass rounded-2xl p-8 lg:p-10 border border-slate-700/50">
                <h1 class="text-3xl lg:text-4xl font-extrabold text-white mb-8 text-center">
                    Edit Buku
                </h1>

                <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nama Buku -->
                    <div>
                        <label for="nama_buku" class="block text-sm font-semibold text-slate-300 mb-2">Nama Buku</label>
                        <input type="text" id="nama_buku" name="nama_buku" value="{{ $book->nama_buku }}"
                               class="w-full bg-white/10 border border-slate-600/50 rounded-lg text-white placeholder-slate-500 focus:border-white focus:ring-2 focus:ring-white/20 p-3 transition duration-150"
                               required>
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label for="kategori" class="block text-sm font-semibold text-slate-300 mb-2">Kategori</label>
                        <input type="text" id="kategori" name="kategori" value="{{ $book->kategori }}"
                               class="w-full bg-white/10 border border-slate-600/50 rounded-lg text-white placeholder-slate-500 focus:border-white focus:ring-2 focus:ring-white/20 p-3 transition duration-150"
                               required>
                    </div>

                    <!-- Jumlah Stok -->
                    <div>
                        <label for="jumlah_buku" class="block text-sm font-semibold text-slate-300 mb-2">Jumlah Stok</label>
                        <input type="number" id="jumlah_buku" name="jumlah_buku" value="{{ $book->jumlah_buku }}" min="0"
                               class="w-full bg-white/10 border border-slate-600/50 rounded-lg text-white placeholder-slate-500 focus:border-white focus:ring-2 focus:ring-white/20 p-3 transition duration-150"
                               required>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-semibold text-slate-300 mb-2">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                                  class="w-full bg-white/10 border border-slate-600/50 rounded-lg text-white placeholder-slate-500 focus:border-white focus:ring-2 focus:ring-white/20 p-3 transition duration-150">{{ $book->deskripsi }}</textarea>
                    </div>

                    <!-- Current Cover -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Cover Saat Ini</label>
                        @if(isset($book) && $book->gambar)
                            <img src="{{ asset('images/'.$book->gambar) }}" alt="Cover {{ $book->nama_buku }}"
                                 class="h-32 w-24 object-cover rounded-lg border border-slate-600/50 mb-4">
                        @else
                            <p class="text-sm text-slate-500 italic">Tidak ada gambar cover saat ini.</p>
                        @endif
                    </div>

                    <!-- Gambar Cover -->
                    <div>
                        <label for="gambar" class="block text-sm font-semibold text-slate-300 mb-2">Ganti Gambar Cover (Opsional)</label>
                        <input type="file" id="gambar" name="gambar" accept="image/*"
                               class="block w-full text-sm text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-white/20 file:text-white hover:file:bg-white/30 p-1.5 border border-slate-600/50 rounded-lg cursor-pointer">
                    </div>

                    <!-- Action buttons -->
                    <div class="flex justify-end space-x-3 pt-6">
                        <a href="{{ route('admin.books') }}"
                           class="inline-flex items-center px-6 py-3 border border-slate-600 text-sm font-semibold rounded-lg text-slate-300 bg-white/5 hover:bg-white/10 transition duration-200">
                            Batal
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-6 py-3 bg-white text-slate-900 font-semibold rounded-lg hover:bg-slate-100 transition duration-200 shadow-lg hover:shadow-xl">
                            Update Buku
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
