<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Seller - LOKALKARYA</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans antialiased text-gray-900">
    <div class="flex min-h-screen">

        @include('layouts.navigation')

        <div class="flex-1 flex flex-col min-w-0">

            <header class="bg-white border-b border-gray-100 sticky top-0 z-20 shadow-sm">
                <div class="max-w-6xl mx-auto px-8 py-5">
                    <h2 class="text-xl font-extrabold text-gray-900 tracking-tight">
                        Verifikasi Seller
                    </h2>
                    <p class="text-gray-500 mt-1 font-medium">Verifikasi dan kelola pendaftaran akun seller baru.</p>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto">
                <div class="max-w-6xl mx-auto px-8 py-8 space-y-4">

                    <div
                        class="bg-white border border-gray-100 p-6 rounded-[2rem] shadow-sm flex items-center justify-between gap-6">

                        <div class="w-48">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Profile</h4>
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                                alt="Profile"
                                class="w-16 h-16 rounded-2xl object-cover border border-gray-200 shadow-sm">
                        </div>

                        <div class="w-64">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Nama Seller</h4>
                            <p class="font-extrabold text-gray-900 text-sm">Design Gen-Z</p>
                        </div>

                        <div class="flex-1">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Email</h4>
                            <p class="font-bold text-gray-900 text-sm">Poster Event Kampus</p>
                        </div>

                        <div class="w-48 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4 text-left">Nomor</h4>
                            <div class="flex justify-start">
                                <a href="" class="font-bold text-gray-900 text-sm">081234567890</a>
                            </div>
                        </div>

                        <div class="w-24 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Aksi</h4>
                            <button
                                class="bg-[#4F46E5] text-white p-2.5 rounded-xl shadow-md transition-all hover:bg-indigo-700 active:scale-95">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </button>
                        </div>

                    </div>

                    <div
                        class="bg-white border border-gray-100 p-6 rounded-[2rem] shadow-sm flex items-center justify-between gap-6">

                        <div class="w-48">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Profile</h4>
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                                alt="Profile"
                                class="w-16 h-16 rounded-2xl object-cover border border-gray-200 shadow-sm">
                        </div>

                        <div class="w-64">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Nama Seller</h4>
                            <p class="font-extrabold text-gray-900 text-sm">Design Gen-Z</p>
                        </div>

                        <div class="flex-1">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Email</h4>
                            <p class="font-bold text-gray-900 text-sm">Poster Event Kampus</p>
                        </div>

                        <div class="w-48 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4 text-left">Nomor</h4>
                            <div class="flex justify-start">
                                <a href="" class="font-bold text-gray-900 text-sm">081234567890</a>
                            </div>
                        </div>

                        <div class="w-24 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Aksi</h4>
                            <button
                                class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">
                                Verifikasi
                            </button>
                        </div>

                    </div>

                </div>
            </main>

        </div>
    </div>
</body>

</html>
