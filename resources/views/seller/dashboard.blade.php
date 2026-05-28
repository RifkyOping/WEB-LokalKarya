<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Seller - LOKALKARYA</title>
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
                        Halo Seller 👋
                    </h2>
                    <p class="text-gray-500 mt-1 font-medium">Pantau performa toko, pesanan, dan produk Anda di sini.
                    </p>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto">
                <div class="max-w-6xl mx-auto p-8 md:p-12 lg:p-16">
                    <div
                        class="bg-white p-8 rounded-[40px] border border-gray-100 shadow-xl shadow-gray-200/40 relative mb-12 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="flex flex-col md:flex-row items-center gap-6 text-center md:text-left w-full">
                            <img src="{{ Auth::user()->sellerProfile && Auth::user()->sellerProfile->foto ? asset('storage/' . Auth::user()->sellerProfile->foto) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name ?? 'Seller') . '&background=2563eb&color=fff&size=200' }}"
                                class="w-24 h-24 rounded-[32px] shadow-xl shadow-blue-600/10 border-4 border-white object-cover">

                            <div class="flex-1">
                                <div class="flex flex-col md:flex-row items-center gap-3 mb-1">
                                    <h3 class="text-2xl font-extrabold text-gray-900 leading-tight flex items-center gap-1.5">
                                        {{ Auth::user()->name ?? 'Seller' }}
                                        @if(Auth::user()->sellerProfile && Auth::user()->sellerProfile->status_verifikasi == 'diterima')
                                        <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        @endif
                                    </h3>
                                </div>
                                <p class="text-gray-500 font-medium text-sm">{{ Auth::user()->sellerProfile->bidang_keahlian ?? 'Creative Designer' }}</p>
                                <p class="text-gray-900 font-bold text-sm mt-2 max-w-2xl">
                                    {{ Auth::user()->sellerProfile->deskripsi ?? 'Membantu kebutuhan publikasi seminar, webinar, organisasi, dan event kampus agar tampil modern.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                        <div>
                            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Jasa & Produk Aktif</h2>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse($produks as $produk)
                        <div
                            class="bg-white rounded-[2rem] border border-gray-100 shadow-xl shadow-gray-200/40 overflow-hidden flex flex-col group hover:border-[#4F46E5]/30 transition-all">
                            <div class="h-56 overflow-hidden">
                                <img src="{{ $produk->gambar_produk ? asset('storage/' . $produk->gambar_produk) : 'https://placehold.co/600x400/e2e8f0/64748b?text=No+Image' }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>

                            <div class="p-8 flex flex-col flex-1">
                                <div class="mb-4">
                                    <span
                                        class="inline-flex items-center justify-center px-4 py-1.5 bg-blue-50 text-blue-600 font-bold text-[11px] uppercase tracking-wider rounded-full">
                                        {{ ucwords(str_replace('-', ' ', $produk->kategori)) }}
                                    </span>
                                </div>

                                <h3
                                    class="text-xl font-extrabold text-gray-900 leading-tight mb-4 group-hover:text-[#4F46E5] transition-colors">
                                    {{ $produk->nama_produk }}
                                </h3>

                                <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-400 text-xs font-medium mb-0.5">Harga mulai dari</p>
                                        <p class="font-extrabold text-2xl text-[#4F46E5]">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full py-12 text-center text-gray-400 bg-white rounded-[2rem] border border-gray-100 shadow-sm">
                            <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <p class="font-semibold text-gray-500 text-sm">Belum ada jasa atau produk aktif</p>
                            <p class="text-xs text-gray-400 mt-1">Produk yang telah disetujui oleh admin akan muncul di sini.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
