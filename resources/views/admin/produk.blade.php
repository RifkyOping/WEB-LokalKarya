<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Produk - LOKALKARYA</title>
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
                        Verifikasi Jasa / Produk
                    </h2>
                    <p class="text-gray-500 mt-1 font-medium">Kelola dan verifikasi layanan yang diajukan oleh kreator.
                    </p>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto">
                <div class="max-w-6xl mx-auto px-8 py-8 space-y-4">

                    <div
                        class="bg-white border border-gray-100 p-6 rounded-[2rem] shadow-sm flex items-center justify-between gap-6">

                        <div class="w-32">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Thumbnail</h4>
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                                alt="Thumbnail"
                                class="w-16 h-12 rounded-xl object-cover border border-gray-200 shadow-sm">
                        </div>

                        <div class="w-48">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Nama Seller</h4>
                            <p class="font-extrabold text-gray-900 text-sm">Design Gen-Z</p>
                        </div>

                        <div class="flex-1">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Nama Jasa /Produk</h4>
                            <p class="font-extrabold text-gray-900 text-sm">Poster Event Kampus</p>
                        </div>

                        <div class="w-40 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4 text-left">Kategori</h4>
                            <div class="flex justify-start">
                                <span
                                    class="bg-indigo-50 text-indigo-600 px-4 py-1.5 rounded-full text-[11px] font-bold">
                                    Desain Grafis
                                </span>
                            </div>
                        </div>

                        <div class="w-32 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4 text-left">Status</h4>
                            <div class="flex justify-start items-center gap-2 text-green-500">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                <span class="font-bold text-xs">Disetujui</span>
                            </div>
                        </div>

                        <div class="w-48 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Aksi</h4>
                            <div class="flex items-center justify-center gap-2">
                                <button
                                    class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">Edit</button>
                                <button
                                    class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">Hapus</button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white border border-gray-100 p-6 rounded-[2rem] shadow-sm flex items-center justify-between gap-6">

                        <div class="w-32">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Thumbnail</h4>
                            <img src="https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                                alt="Thumbnail"
                                class="w-16 h-12 rounded-xl object-cover border border-gray-200 shadow-sm">
                        </div>

                        <div class="w-48">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Nama Seller</h4>
                            <p class="font-extrabold text-gray-900 text-sm">UI Design</p>
                        </div>

                        <div class="flex-1">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Nama Jasa /Produk</h4>
                            <p class="font-extrabold text-gray-900 text-sm">UI Landing Page</p>
                        </div>

                        <div class="w-40 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4 text-left">Kategori</h4>
                            <div class="flex justify-start">
                                <span
                                    class="bg-indigo-50 text-indigo-600 px-4 py-1.5 rounded-full text-[11px] font-bold">
                                    UI Design
                                </span>
                            </div>
                        </div>

                        <div class="w-32 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4 text-left">Status</h4>
                            <div class="flex justify-start items-center gap-2 text-yellow-500">
                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                <span class="font-bold text-xs">Tunggu</span>
                            </div>
                        </div>

                        <div class="w-48 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Aksi</h4>
                            <div class="flex items-center justify-center gap-2">
                                <button
                                    class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">Verifikasi</button>
                                <button
                                    class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">Hapus</button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white border border-gray-100 p-6 rounded-[2rem] shadow-sm flex items-center justify-between gap-6">

                        <div class="w-32">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Thumbnail</h4>
                            <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                                alt="Thumbnail"
                                class="w-16 h-12 rounded-xl object-cover border border-gray-200 shadow-sm grayscale">
                        </div>

                        <div class="w-48">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Nama Seller</h4>
                            <p class="font-extrabold text-gray-900 text-sm">Monocative</p>
                        </div>

                        <div class="flex-1">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Nama Jasa /Produk</h4>
                            <p class="font-extrabold text-gray-900 text-sm">Feed Instagram Event</p>
                        </div>

                        <div class="w-40 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4 text-left">Kategori</h4>
                            <div class="flex justify-start">
                                <span
                                    class="bg-indigo-50 text-indigo-600 px-4 py-1.5 rounded-full text-[11px] font-bold">
                                    Social Media
                                </span>
                            </div>
                        </div>

                        <div class="w-32 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4 text-left">Status</h4>
                            <div class="flex justify-start items-center gap-2 text-red-500">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                <span class="font-bold text-xs">Ditolak</span>
                            </div>
                        </div>

                        <div class="w-48 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-4">Aksi</h4>
                            <div class="flex items-center justify-center gap-2">
                                <button
                                    class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">Edit</button>
                                <button
                                    class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">Hapus</button>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

        </div>
    </div>
</body>

</html>
