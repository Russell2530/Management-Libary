<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
{{-- Dark theme with glassmorphism and gradient background --}}
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-slate-100 min-h-screen flex flex-col font-sans">

    <!-- HEADER -->
    <header class="w-full px-6 py-4 flex justify-between items-center bg-white/5 backdrop-blur-md border-b border-white/10">
        <h1 class="text-2xl font-bold text-white">📚 Management Library</h1>

        @if (Route::has('login'))
            <div class="flex items-center space-x-4 relative">
                @auth
                    <!-- User Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 font-semibold text-slate-100 focus:outline-none hover:text-slate-300 transition">
                            <span>{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform group-hover:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-40 bg-white/10 backdrop-blur-md border border-white/20 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-slate-100 hover:bg-white/20 rounded-lg transition">
                                    🚪 Log out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Login & Register -->
                    <a href="{{ route('login') }}" class="text-slate-300 hover:text-white font-semibold transition">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-slate-300 hover:text-white font-semibold transition">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow flex flex-col justify-center items-center text-center px-6">
        <h2 class="text-5xl font-extrabold mb-4 text-white">Welcome to Management Library</h2>
        <p class="text-slate-300 text-lg mb-8 max-w-xl">
            Sistem manajemen perpustakaan digital untuk menemukan dan mengelola buku favoritmu dengan mudah.
        </p>

        <a href="{{ route('user.books') }}"
           class="bg-white/20 hover:bg-white/30 backdrop-blur-sm border border-white/30 text-white font-semibold px-8 py-3 rounded-lg text-lg shadow-lg hover:shadow-xl transition-all duration-300">
           📖 Lihat Koleksi Buku
        </a>
    </main>

    <!-- FOOTER -->
    <footer class="py-4 text-center text-sm text-slate-400 border-t border-white/10">
        &copy; {{ date('Y') }} Rafka Noor Putra | All rights reserved.
    </footer>

</body>
</html>
