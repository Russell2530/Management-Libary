<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl text-gray-800 leading-tight flex items-center space-x-2">
            <span class="text-amber-500">👋</span>
            <span>Selamat Datang di Dashboard!</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-xl border-t-8 border-indigo-600">
                <div class="p-8 md:p-10 text-gray-900">
                    <div class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                        </svg>
                        <div>
                            <p class="text-xl font-semibold mb-1">Status Akun:</p>
                            <h3 class="text-4xl font-extrabold text-indigo-800">{{ __("Anda berhasil masuk!") }}</h3>
                        </div>
                    </div>

                    <hr class="my-6 border-gray-200">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-indigo-50 p-6 rounded-lg shadow-inner border-l-4 border-indigo-500">
                            <p class="text-sm text-indigo-700 font-medium">Peran Anda</p>
                            <span class="text-2xl font-black text-indigo-900 uppercase">{{ Auth::user()->role }}</span>
                        </div>
                        <div class="bg-amber-50 p-6 rounded-lg shadow-inner border-l-4 border-amber-500">
                            <p class="text-sm text-amber-700 font-medium">Lihat Koleksi</p>
                            <a href="{{ route('user.books') }}" class="text-xl font-bold text-amber-900 hover:text-amber-600 transition">Katalog Buku →</a>
                        </div>
                        <div class="bg-green-50 p-6 rounded-lg shadow-inner border-l-4 border-green-500">
                            <p class="text-sm text-green-700 font-medium">Akun Anda</p>
                            <a href="{{ route('profile.edit') }}" class="text-xl font-bold text-green-900 hover:text-green-600 transition">Edit Profil →</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
