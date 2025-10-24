<x-app-layout>
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Form container with glassmorphism -->
        <div class="glass rounded-2xl p-8 lg:p-10 border border-slate-700/50">
            <h3 class="text-3xl lg:text-4xl font-extrabold text-white mb-8 text-center">
                Konfirmasi Peminjaman
            </h3>

            <form action="{{ route('user.books.store') }}" method="POST" class="space-y-6">
                @csrf

                <input type="hidden" name="book_id" value="{{ $book->id }}">

                <!-- Borrower info -->
                <div class="bg-white/10 p-4 rounded-lg border border-slate-700/50">
                    <label class="block text-sm font-medium text-slate-300 mb-2">Peminjam</label>
                    <p class="text-lg font-semibold text-white">{{ Auth::user()->name }}</p>
                    <input type="hidden" name="nama_peminjam" value="{{ Auth::user()->name }}">
                </div>

                <!-- Book info -->
                <div class="bg-white/5 p-4 rounded-lg border border-slate-700/50">
                    <label class="block text-sm font-medium text-slate-300 mb-2">Buku yang Dipinjam</label>
                    <p class="text-lg font-semibold text-white">{{ $book->nama_buku }}</p>
                </div>

                <!-- Quantity -->
                <div>
                    <label for="jumlah_buku" class="block text-sm font-bold text-slate-300 mb-2">Jumlah Buku yang Dipinjam</label>
                    <input type="number" id="jumlah_buku" name="jumlah_buku" min="1" max="{{ $book->jumlah_buku }}" value="1"
                        class="w-full bg-white/10 border border-slate-600/50 rounded-lg text-white placeholder-slate-500 focus:border-white focus:ring-2 focus:ring-white/20 p-3 transition duration-150"
                        required>
                    <p class="text-sm text-slate-400 mt-2">Stok Tersedia Maksimal: <span class="font-bold text-white">{{ $book->jumlah_buku }}</span></p>
                </div>

                <!-- Dates -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="tanggal_pinjam" class="block text-sm font-bold text-slate-300 mb-2">Tanggal Pinjam</label>
                        <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ date('Y-m-d') }}"
                            class="w-full bg-white/10 border border-slate-600/50 rounded-lg text-white placeholder-slate-500 focus:border-white focus:ring-2 focus:ring-white/20 p-3 transition duration-150"
                            required>
                    </div>
                    <div>
                        <label for="tanggal_kembali" class="block text-sm font-bold text-slate-300 mb-2">Tanggal Target Kembali</label>
                        <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                            class="w-full bg-white/10 border border-slate-600/50 rounded-lg text-white placeholder-slate-500 focus:border-white focus:ring-2 focus:ring-white/20 p-3 transition duration-150"
                            required>
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="flex justify-between space-x-4 pt-6">
                    <a href="{{ route('user.books.detail', $book->id) }}"
                        class="flex-1 inline-flex items-center justify-center px-6 py-3 border border-slate-600 text-base font-semibold rounded-lg text-slate-300 bg-white/5 hover:bg-white/10 transition duration-200">
                        Batalkan
                    </a>
                    <button type="submit"
                            class="flex-1 inline-flex items-center justify-center px-8 py-3 bg-white text-slate-900 font-bold rounded-lg hover:bg-slate-100 transition duration-200 shadow-lg hover:shadow-xl">
                        Konfirmasi & Pinjam
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
