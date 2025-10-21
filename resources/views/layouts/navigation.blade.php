<nav x-data="{ open: false }" class="bg-indigo-800 border-b border-indigo-700 shadow-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        {{-- Menggunakan warna putih/kuning untuk kontras logo --}}
                        <x-application-logo class="block h-9 w-auto fill-current text-amber-300" />
                    </a>
                </div>

                <div class="hidden space-x-1 sm:-my-px sm:ms-10 sm:flex items-center">
                    @php
                        // Helper class untuk Nav Link baru
                        $navLinkClass = 'px-3 py-2 text-sm font-medium text-white hover:bg-indigo-600 rounded-lg transition duration-150 ease-in-out';
                        $navLinkActiveClass = 'bg-indigo-900 text-amber-300 shadow-inner';
                    @endphp

                    @if(Auth::check())
                        {{-- Tautan untuk Admin --}}
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? $navLinkClass . ' ' . $navLinkActiveClass : $navLinkClass }}">
                                📊 {{ __('Dashboard Admin') }}
                            </a>
                            <a href="{{ route('admin.books') }}" class="{{ request()->routeIs('admin.books') ? $navLinkClass . ' ' . $navLinkActiveClass : $navLinkClass }}">
                                📖 Kelola Buku
                            </a>
                            <a href="{{ route('admin.riwayat') }}" class="{{ request()->routeIs('admin.riwayat') ? $navLinkClass . ' ' . $navLinkActiveClass : $navLinkClass }}">
                                👥 Data Peminjam
                            </a>
                        {{-- Tautan untuk User --}}
                        @elseif(Auth::user()->role === 'user')
                            <a href="{{ route('user.books') }}" class="{{ request()->routeIs('user.books') ? $navLinkClass . ' ' . $navLinkActiveClass : $navLinkClass }}">
                                📚 Katalog Buku
                            </a>
                            <a href="{{ route('user.riwayat') }}" class="{{ request()->routeIs('user.riwayat') ? $navLinkClass . ' ' . $navLinkActiveClass : $navLinkClass }}">
                                ⏳ Riwayat Saya
                            </a>
                        @endif
                    @endif
                </div>

            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center p-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-300 transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            ⚙️ {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                🚪 {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-indigo-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-indigo-900">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:bg-indigo-700">
                🏠 {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if(Auth::check())
                {{-- Responsive Tautan Admin/User --}}
                @if(Auth::user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-white hover:bg-indigo-700">
                        📊 {{ __('Dashboard Admin') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.books')" :active="request()->routeIs('admin.books')" class="text-white hover:bg-indigo-700">
                        📖 Kelola Buku
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.riwayat')" :active="request()->routeIs('admin.riwayat')" class="text-white hover:bg-indigo-700">
                        👥 Data Peminjam
                    </x-responsive-nav-link>
                @elseif(Auth::user()->role === 'user')
                    <x-responsive-nav-link :href="route('user.books')" :active="request()->routeIs('user.books')" class="text-white hover:bg-indigo-700">
                        📚 Katalog Buku
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('user.riwayat')" :active="request()->routeIs('user.riwayat')" class="text-white hover:bg-indigo-700">
                        ⏳ Riwayat Saya
                    </x-responsive-nav-link>
                @endif
            @endif
        </div>

        <div class="pt-4 pb-1 border-t border-indigo-700">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-indigo-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-indigo-700">
                    ⚙️ {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();" class="text-white hover:bg-indigo-700">
                        🚪 {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
