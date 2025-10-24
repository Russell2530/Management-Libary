<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Updated login form with dark theme styling -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-white text-center">Masuk</h1>
        <p class="text-slate-400 text-center text-sm mt-2">Masukkan kredensial Anda untuk melanjutkan</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-slate-300" />
            <x-text-input id="email" class="block mt-1 w-full bg-white/10 border border-slate-600/50 rounded-lg text-white placeholder-slate-500 focus:border-white focus:ring-2 focus:ring-white/20 transition duration-150" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-slate-300" />

            <x-text-input id="password" class="block mt-1 w-full bg-white/10 border border-slate-600/50 rounded-lg text-white placeholder-slate-500 focus:border-white focus:ring-2 focus:ring-white/20 transition duration-150"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-slate-600/50 bg-white/10 text-white focus:ring-2 focus:ring-white/20" name="remember">
                <span class="ms-2 text-sm text-slate-300">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-slate-400 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-900 focus:ring-white transition duration-200" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif

            <x-primary-button class="bg-white text-slate-900 hover:bg-slate-100 font-semibold px-6 py-2 rounded-lg transition duration-200 shadow-lg">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
