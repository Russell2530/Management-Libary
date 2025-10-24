<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- role --}}
        <div class="mt-4">
            <x-input-label for="role" value="Daftar sebagai" />
            <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-3">
                {{-- Glassmorphic role selection --}}
                <label class="flex items-center gap-3 rounded-lg border p-3 {{ old('role', 'user') === 'user' ? 'border-white/50 bg-white/20' : 'border-white/20 bg-white/10' }} cursor-pointer transition hover:bg-white/20">
                    <input type="radio" name="role" value="user" class="text-white focus:ring-white/50 bg-white/10" {{ old('role', 'user') === 'user' ? 'checked' : '' }}>
                    <span>
                        <span class="font-medium text-white block">pengguna</span>
                        <span class="text-xs text-slate-400">Belanja dan lakukan pemesanan produk.</span>
                    </span>
                </label>
                <label class="flex items-center gap-3 rounded-lg border p-3 {{ old('role') === 'admin' ? 'border-white/50 bg-white/20' : 'border-white/20 bg-white/10' }} cursor-pointer transition hover:bg-white/20">
                    <input type="radio" name="role" value="admin" class="text-white focus:ring-white/50 bg-white/10" {{ old('role') === 'admin' ? 'checked' : '' }}>
                    <span>
                        <span class="font-medium text-white block">Admin</span>
                        <span class="text-xs text-slate-400">Kelola produk dan proses pesanan pelanggan.</span>
                    </span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-slate-300 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white/50" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
