<section class="space-y-6">
    <header>
        <h2 class="text-xl font-extrabold text-red-600">
            Hapus Akun
        </h2>
        <p class="mt-1 text-sm text-gray-600 font-medium">
            Setelah akun Anda dihapus, semua sumber daya dan data yang terkait akan dihapus secara permanen. Sebelum
            menghapus akun, harap unduh data atau informasi apa pun yang ingin Anda simpan.
        </p>
    </header>

    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-md transition-all active:scale-95">
        {{ __('Hapus Akun Permanen') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('destroy.seller') }}" class="p-8 bg-white rounded-[2rem]">
            @csrf
            @method('delete')

            <h2 class="text-xl font-extrabold text-gray-900">
                Apakah Anda yakin ingin menghapus akun Anda?
            </h2>

            <p class="mt-1 text-sm text-gray-500 font-medium">
                Setelah akun Anda dihapus, semua sumber daya dan data yang terkait akan dihapus secara permanen. Harap
                unduh data atau informasi apa pun yang ingin Anda simpan sebelum menghapus akun.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input id="password" name="password" type="password"
                    class="mt-1 block w-full rounded-xl border-gray-200 focus:border-red-500 focus:ring-red-500 shadow-sm"
                    placeholder="{{ __('Masukkan Kata sandi') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')"
                    class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-5 py-2.5 rounded-xl font-bold text-sm transition-all">
                    {{ __('Batal') }}
                </button>
                <button
                    class="bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-xl font-bold text-sm shadow-md transition-all">
                    {{ __('Ya, Hapus Akun') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
