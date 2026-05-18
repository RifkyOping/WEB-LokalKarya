<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-900 leading-tight">Profile Saya</h2>
                <p class="text-sm text-gray-500 font-medium mt-1">Kelola identitas dan tampilan profile publikmu.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <div
                class="p-8 bg-white shadow-sm border border-gray-100 rounded-[2rem] flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="flex items-center gap-6">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Kreator') }}&background=1f2937&color=fff&size=200"
                        class="w-20 h-20 rounded-[1.25rem] object-cover shadow-sm border-2 border-white">
                    <div>
                        <h3 class="text-2xl font-extrabold text-gray-900">{{ Auth::user()->name ?? 'Kreator' }}</h3>
                        <p class="text-gray-500 font-medium text-sm">Creative Designer</p>
                    </div>
                </div>
                <div
                    class="w-full md:w-auto bg-gray-50/50 p-2 rounded-xl border border-gray-200 flex items-center justify-between gap-12 sm:min-w-[320px]">
                    <span class="text-sm text-gray-500 font-medium pl-3">Unggah Foto Profil</span>
                    <button type="button"
                        class="bg-white border border-gray-200 text-gray-700 hover:text-gray-900 hover:bg-gray-50 px-5 py-2 rounded-lg text-xs font-bold transition-all shadow-sm">
                        Pilih file
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="lg:col-span-2 space-y-6">

                    <div class="p-8 bg-white shadow-sm border border-gray-100 rounded-[2rem]">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <div class="p-8 bg-white shadow-sm border border-gray-100 rounded-[2rem]">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-extrabold text-gray-900">Skill & Layanan</h2>
                            <button
                                class="bg-[#4F46E5] hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-bold text-xs shadow-md shadow-indigo-600/20 transition-all active:scale-95">
                                + Tambah Skill
                            </button>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <span
                                class="inline-flex items-center gap-2 px-4 py-2 bg-gray-50 border border-gray-100 text-gray-700 font-bold text-[13px] rounded-xl">
                                Poster Event <button class="text-gray-400 hover:text-red-500 transition-colors"><svg
                                        class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg></button>
                            </span>
                            <span
                                class="inline-flex items-center gap-2 px-4 py-2 bg-gray-50 border border-gray-100 text-gray-700 font-bold text-[13px] rounded-xl">
                                UI Design <button class="text-gray-400 hover:text-red-500 transition-colors"><svg
                                        class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg></button>
                            </span>
                        </div>
                    </div>

                    <div class="p-8 bg-white shadow-sm border border-gray-100 rounded-[2rem]">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-extrabold text-gray-900">Portfolio</h2>
                            <button
                                class="bg-[#4F46E5] hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-bold text-xs shadow-md shadow-indigo-600/20 transition-all active:scale-95">
                                + Upload Karya
                            </button>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <img src="https://placehold.co/400x300/e2e8f0/64748b?text=Portfolio+1"
                                class="w-full h-40 object-cover rounded-2xl border border-gray-100 shadow-sm cursor-pointer">
                            <img src="https://placehold.co/400x300/e2e8f0/64748b?text=Portfolio+2"
                                class="w-full h-40 object-cover rounded-2xl border border-gray-100 shadow-sm cursor-pointer">
                            <button
                                class="w-full h-40 flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-300 rounded-2xl text-gray-500 hover:text-[#4F46E5] hover:border-[#4F46E5] hover:bg-indigo-50/50 transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span class="font-bold text-sm">Upload Portfolio</span>
                            </button>
                        </div>
                    </div>

                    <div class="p-8 bg-white shadow-sm border border-gray-100 rounded-[2rem]">
                        @include('profile.partials.update-password-form')
                    </div>

                    <div class="p-8 bg-red-50/30 border border-red-100 shadow-sm rounded-[2rem]">
                        @include('profile.partials.delete-user-form')
                    </div>

                </div>

                <div class="lg:col-span-1 space-y-6">
                    <div class="p-8 bg-white shadow-sm border border-gray-100 rounded-[2rem] sticky top-28">
                        <h2 class="text-xl font-extrabold text-gray-900 mb-6">Kontak</h2>

                        <div class="space-y-6">
                            <div>
                                <label
                                    class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">WhatsApp</label>
                                <input type="text" value="+62 812 3456 7890"
                                    class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm text-gray-900 font-medium">
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Instagram</label>
                                <input type="text" value="@rizkycreative"
                                    class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm text-gray-900 font-medium">
                            </div>

                            <div class="flex justify-center pt-2">
                                <button
                                    class="bg-[#4F46E5] hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-md shadow-indigo-600/20 transition-all hover:-translate-y-0.5 active:scale-95 whitespace-nowrap">
                                    Simpan Perubahan
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
