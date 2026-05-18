<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - LOKALKARYA</title>
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
                        Halo Admin 👋
                    </h2>
                    <p class="text-gray-500 mt-1 font-medium">Pantau performa toko, pesanan, dan produk Anda di sini.
                    </p>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto">
                <div class="max-w-6xl mx-auto px-8 py-8 space-y-10">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white px-8 py-6 rounded-[1.5rem] border border-gray-100 shadow-sm">
                            <h3 class="text-xs font-bold text-gray-400 mb-2">Total Seller</h3>
                            <p class="text-4xl font-extrabold text-[#0f172a]">{{ $totalSeller }}</p>
                        </div>

                        <div class="bg-white px-8 py-6 rounded-[1.5rem] border border-gray-100 shadow-sm">
                            <h3 class="text-xs font-bold text-gray-400 mb-2">Menunggu Verifikasi Akun</h3>
                            <p class="text-4xl font-extrabold text-[#0f172a]">24</p>
                        </div>

                        <div class="bg-white px-8 py-6 rounded-[1.5rem] border border-gray-100 shadow-sm">
                            <h3 class="text-xs font-bold text-gray-400 mb-2">Menunggu Verifikasi Jasa /Produk</h3>
                            <p class="text-4xl font-extrabold text-[#0f172a]">30</p>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-xl font-extrabold text-gray-900 mb-6">Aktivitas Terbaru</h2>

                        <div class="space-y-4">
                            <div
                                class="bg-white border border-gray-100 p-5 rounded-2xl flex flex-col sm:flex-row sm:justify-between sm:items-start gap-2 shadow-sm">
                                <div>
                                    <h4 class="font-extrabold text-gray-900 text-sm mb-1">Pengguna Baru Mendaftar</h4>
                                    <p class="text-sm text-gray-500 font-medium">Rizky Creative mengajukan akun kreator
                                        baru.</p>
                                </div>
                                <span class="text-xs font-bold text-gray-400 whitespace-nowrap">5 menit lalu</span>
                            </div>

                            <div
                                class="bg-white border border-gray-100 p-5 rounded-2xl flex flex-col sm:flex-row sm:justify-between sm:items-start gap-2 shadow-sm">
                                <div>
                                    <h4 class="font-extrabold text-gray-900 text-sm mb-1">Jasa Baru Ditambahkan</h4>
                                    <p class="text-sm text-gray-500 font-medium">Poster Seminar Nasional menunggu
                                        verifikasi admin.</p>
                                </div>
                                <span class="text-xs font-bold text-gray-400 whitespace-nowrap">12 menit lalu</span>
                            </div>

                            <div
                                class="bg-white border border-gray-100 p-5 rounded-2xl flex flex-col sm:flex-row sm:justify-between sm:items-start gap-2 shadow-sm">
                                <div>
                                    <h4 class="font-extrabold text-gray-900 text-sm mb-1">Verifikasi Menunggu</h4>
                                    <p class="text-sm text-gray-500 font-medium">3 jasa baru memerlukan persetujuan
                                        admin.</p>
                                </div>
                                <span class="text-xs font-bold text-gray-400 whitespace-nowrap">25 menit lalu</span>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

        </div>
    </div>
</body>

</html>
