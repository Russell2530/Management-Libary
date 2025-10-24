<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-slate-400">
            {{ __("Perbarui informasi profil dan alamat email akun Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" class="text-slate-300" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-white/10 border border-slate-600/50 rounded-lg text-white placeholder-slate-500 focus:border-white focus:ring-2 focus:ring-white/20 transition duration-150" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-slate-300" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-white/10 border border-slate-600/50 rounded-lg text-white placeholder-slate-500 focus:border-white focus:ring-2 focus:ring-white/20 transition duration-150" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-slate-400">
                        {{ __('Alamat email Anda belum diverifikasi.') }}

                        <button form="send-verification" class="underline text-sm text-slate-300 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-900 focus:ring-white transition duration-200">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-400">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-white text-slate-900 hover:bg-slate-100 font-semibold px-6 py-2 rounded-lg transition duration-200 shadow-lg">{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-400"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
