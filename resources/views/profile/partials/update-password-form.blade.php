<section>
    <header>
        <h2 class="text-xl font-extrabold text-gray-900">
            Perbarui Kata Sandi
        </h2>
        <p class="mt-1 text-sm text-gray-500 font-medium">
            Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')" class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')" class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button class="bg-gray-900 hover:bg-black text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-md transition-all active:scale-95">
                {{ __('Simpan Sandi') }}
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 font-bold bg-green-50 px-4 py-2 rounded-lg">
                    {{ __('Tersimpan.') }}
                </p>
            @endif
        </div>
    </form>
</section>