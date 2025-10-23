<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">

    <!-- HEADER -->
    <header class="w-full px-6 py-4 flex justify-between items-center bg-gray-800 shadow-lg">
        <h1 class="text-2xl font-bold text-indigo-400">📚 Management Library</h1>

        @if (Route::has('login'))
            <div class="flex items-center space-x-4 relative">
                @auth
                    <!-- User Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 font-semibold focus:outline-none">
                            <span>{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform group-hover:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-40 bg-gray-800 border border-gray-700 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-700 rounded-lg">
                                    🚪 Log out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Login & Register -->
                    <a href="{{ route('login') }}" class="hover:text-indigo-400 font-semibold">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hover:text-indigo-400 font-semibold">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow flex flex-col justify-center items-center text-center px-6">
        <h2 class="text-5xl font-extrabold mb-4 text-indigo-400">Welcome to Management Library</h2>
        <p class="text-gray-300 text-lg mb-8 max-w-xl">
            Sistem manajemen perpustakaan digital untuk menemukan dan mengelola buku favoritmu dengan mudah.
        </p>

        <a href="{{ route('user.books') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-8 py-3 rounded-full text-lg shadow-lg hover:shadow-indigo-500/50 transition-all duration-300">
           📖 Lihat Koleksi Buku
        </a>
    </main>

    <!-- FOOTER -->
    <footer class="py-4 text-center text-sm text-gray-500 border-t border-gray-700">
        &copy; {{ date('Y') }} SMK Pesat ITXpro | All rights reserved.
    </footer>

</body>
</html>
