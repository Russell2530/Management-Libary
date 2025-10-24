<x-app-layout>
    <x-slot name="header">
        {{-- White text for dark background --}}
        <h2 class="font-extrabold text-3xl text-white leading-tight flex items-center space-x-2">
            <span>👋</span>
            <span>Selamat Datang di Dashboard!</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Glassmorphic card with backdrop blur --}}
            <div class="bg-white/10 backdrop-blur-md overflow-hidden border border-white/20 sm:rounded-2xl shadow-2xl">
                <div class="p-8 md:p-10 text-slate-100">
                    <div class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                        </svg>
                        <div>
                            <p class="text-xl font-semibold mb-1 text-slate-300">Status Akun:</p>
                            <h3 class="text-4xl font-extrabold text-white">{{ __("Anda berhasil masuk!") }}</h3>
                        </div>
                    </div>

                    <hr class="my-6 border-white/20">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{-- Glassmorphic stat cards --}}
                        <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20 shadow-lg hover:shadow-xl transition duration-300">
                            <p class="text-sm text-slate-300 font-medium">Peran Anda</p>
                            <span class="text-2xl font-black text-white uppercase">{{ Auth::user()->role }}</span>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20 shadow-lg hover:shadow-xl transition duration-300">
                            <p class="text-sm text-slate-300 font-medium">Lihat Koleksi</p>
                            <a href="{{ route('user.books') }}" class="text-xl font-bold text-white hover:text-slate-300 transition">Katalog Buku →</a>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20 shadow-lg hover:shadow-xl transition duration-300">
                            <p class="text-sm text-slate-300 font-medium">Akun Anda</p>
                            <a href="{{ route('profile.edit') }}" class="text-xl font-bold text-white hover:text-slate-300 transition">Edit Profil →</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
