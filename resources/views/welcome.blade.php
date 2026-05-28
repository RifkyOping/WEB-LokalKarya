<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOKALKARYA - Katalog Jasa Mahasiswa</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased text-gray-900">

    <header class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-2">
                    <div
                        class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">
                        L</div>
                    <span class="font-extrabold text-xl tracking-tight">LOKALKARYA</span>
                </div>

                <nav class="hidden md:flex space-x-8">
                    <a href="{{ url('/') }}"
                        class="text-gray-900 font-medium text-sm transition-colors hover:text-blue-600">Beranda</a>
                    <a href="#katalog"
                        class="text-gray-500 hover:text-gray-900 font-medium text-sm transition-colors">Katalog</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 font-medium text-sm">Kategori</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 font-medium text-sm">Tentang</a>
                    <a href="#footer"
                        class="text-gray-500 hover:text-gray-900 font-medium text-sm transition-colors">Kontak</a>
                </nav>

                <div class="flex items-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm font-medium text-gray-700 hover:text-gray-900 mr-4">Dashboard</a>
                        @endauth
                    @endif
                    <a href="{{ route('login') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-all hover:shadow-lg active:scale-95">
                        Mulai Jual Karya
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="py-14 text-center max-w-4xl mx-auto px-4 animate-fade-in-up">
        <div
            class="inline-block bg-blue-50 text-blue-600 px-4 py-1.5 rounded-full text-xs font-semibold tracking-wide mb-6">
            Sistem Informasi Pemasaran Jasa Kreatif dan Produk Lingkup Kampus
        </div>

        <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight mb-6">
            Dari Mahasiswa <br> untuk <span class="text-blue-600">Dunia</span>
        </h1>

        <p class="text-lg text-gray-500 mb-8 max-w-2xl mx-auto">
            Temukan jasa desain, editing, UI/UX, fotografi, videografi, dan karya kreatif lainnya dari mahasiswa
            berbakat Indonesia.
        </p>

        <form action="{{ route('home') }}" method="GET"
            class="max-w-2xl mx-auto mb-10 flex items-center bg-white rounded-full border border-gray-200 shadow-sm p-1.5 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition-all">

            <div class="relative shrink-0">
                <select name="filter_type"
                    class="bg-transparent border-transparent focus:border-transparent focus:ring-0 text-sm text-gray-700 font-bold pl-4 pr-8 py-3 cursor-pointer outline-none w-full appearance-none">
                    <option value="semua" {{ request('filter_type') == 'semua' ? 'selected' : '' }}>Semua</option>
                    <option value="judul" {{ request('filter_type') == 'judul' ? 'selected' : '' }}>Judul</option>
                    <option value="kategori" {{ request('filter_type') == 'kategori' ? 'selected' : '' }}>Kategori</option>
                    <option value="seller" {{ request('filter_type') == 'seller' ? 'selected' : '' }}>Nama Seller</option>
                </select>
            </div>

            <div class="w-px h-6 bg-gray-300 mx-2 shrink-0"></div>

            <div class="relative flex-1 flex items-center">
                <svg class="w-5 h-5 text-gray-400 absolute left-3" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik kata kunci pencarian..."
                    class="w-full bg-transparent border-transparent focus:border-transparent focus:ring-0 text-sm text-gray-900 pl-10 pr-3 py-3 outline-none">
            </div>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-full text-sm font-bold shadow-md transition-all active:scale-95 shrink-0">
                Cari
            </button>
        </form>

        <div class="flex flex-wrap justify-center gap-3" id="filter-container">
            <a href="{{ route('home', array_merge(request()->query(), ['kategori' => null])) }}"
                class="filter-btn {{ !request('kategori') ? 'bg-blue-600 text-white border-transparent' : 'bg-white text-gray-600 hover:bg-gray-50 border-gray-200' }} px-6 py-2 rounded-full text-sm font-medium shadow-sm border">Semua</a>
            <a href="{{ route('home', array_merge(request()->query(), ['kategori' => 'UI/UX'])) }}"
                class="filter-btn {{ request('kategori') == 'UI/UX' ? 'bg-blue-600 text-white border-transparent' : 'bg-white text-gray-600 hover:bg-gray-50 border-gray-200' }} px-6 py-2 rounded-full text-sm font-medium shadow-sm border">UI/UX</a>
            <a href="{{ route('home', array_merge(request()->query(), ['kategori' => 'Desain Grafis'])) }}"
                class="filter-btn {{ request('kategori') == 'Desain Grafis' ? 'bg-blue-600 text-white border-transparent' : 'bg-white text-gray-600 hover:bg-gray-50 border-gray-200' }} px-6 py-2 rounded-full text-sm font-medium shadow-sm border">Desain Grafis</a>
            <a href="{{ route('home', array_merge(request()->query(), ['kategori' => 'Video Editing'])) }}"
                class="filter-btn {{ request('kategori') == 'Video Editing' ? 'bg-blue-600 text-white border-transparent' : 'bg-white text-gray-600 hover:bg-gray-50 border-gray-200' }} px-6 py-2 rounded-full text-sm font-medium shadow-sm border">Video Editing</a>
            <a href="{{ route('home', array_merge(request()->query(), ['kategori' => 'Fotografi'])) }}"
                class="filter-btn {{ request('kategori') == 'Fotografi' ? 'bg-blue-600 text-white border-transparent' : 'bg-white text-gray-600 hover:bg-gray-50 border-gray-200' }} px-6 py-2 rounded-full text-sm font-medium shadow-sm border">Fotografi</a>
        </div>
    </section>

    <section id="katalog" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-gray-900">Daftar Jasa dan Produk</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($produks as $produk)
            <div
                class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group flex flex-col">
                <img src="{{ $produk->gambar_produk ? asset('storage/' . $produk->gambar_produk) : 'https://placehold.co/400x300/e2e8f0/64748b?text=' . urlencode($produk->kategori) }}" alt="{{ $produk->nama_produk }}"
                    class="w-full h-48 object-cover">
                <div class="p-5 flex flex-col flex-grow">
                    <span
                        class="text-[10px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-2 py-1 rounded-md mb-3 inline-block self-start">{{ $produk->kategori }}</span>
                    <h3 class="font-bold text-gray-900 text-base leading-tight mb-2 flex-grow">{{ $produk->nama_produk }}</h3>
                    <div class="flex items-center gap-1 mb-4 text-sm text-gray-600">
                        <span>{{ $produk->user->name }}</span>
                        @if($produk->user->sellerProfile && $produk->user->sellerProfile->status_verifikasi == 'diterima')
                        <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        @endif
                    </div>
                    <div class="flex items-end justify-between mt-4 pt-4 border-t border-gray-50">
                        <div>
                            <span class="text-xs text-gray-500 block">Mulai dari</span>
                            <span class="font-bold text-lg text-gray-900">Rp{{ number_format($produk->harga, 0, ',', '.') }}</span>
                        </div>
                        <a href="{{ route('produk.detail', $produk->id) }}"
                            class="bg-gray-900 hover:bg-black text-white px-4 py-2 rounded-lg text-xs font-medium transition-colors">Lihat
                            Detail</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada produk</h3>
                <p class="mt-1 text-sm text-gray-500">Belum ada jasa atau produk yang sesuai dengan pencarian Anda.</p>
            </div>
            @endforelse

        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div
            class="bg-blue-600 rounded-3xl p-10 md:p-16 text-center text-white shadow-xl shadow-blue-600/20 transition-transform hover:scale-[1.01] duration-500">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Bangun Portofolio <br> dan Dapatkan Klien Pertamamu</h2>
            <p class="text-blue-100 max-w-2xl mx-auto mb-8 text-sm md:text-base">
                LOKALKARYA membantu mahasiswa kreatif mendapatkan pengalaman, penghasilan, dan koneksi profesional
                melalui karya nyata.
            </p>
            <a href="{{ route('login') }}"
                class="inline-block bg-white text-blue-600 hover:bg-blue-50 px-8 py-3 rounded-full font-semibold text-sm transition-all hover:shadow-lg hover:scale-105 active:scale-95">
                Gabung Sekarang
            </a>
        </div>
    </section>

    <footer id="footer" class="bg-white border-t border-gray-100 pt-16 pb-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div>
                <div class="font-extrabold text-xl tracking-tight mb-4">LOKALKARYA</div>
                <p class="text-gray-500 text-sm leading-relaxed max-w-xs">
                    Platform pemasaran jasa kreatif mahasiswa Indonesia untuk membantu talenta muda berkembang dan
                    dikenal lebih luas.
                </p>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 mb-4">Navigasi</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li><a href="{{ url('/') }}" class="hover:text-blue-600 transition-colors">Beranda</a></li>
                    <li><a href="#katalog" class="hover:text-blue-600 transition-colors">Katalog</a></li>
                    <li><a href="#" class="hover:text-blue-600">Kategori</a></li>
                    <li><a href="#footer" class="hover:text-blue-600 transition-colors">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 mb-4">Kontak</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li>Email: hello@lokalkarya.id</li>
                    <li>Instagram: @lokalkarya.id</li>
                    <li>Indonesia</li>
                </ul>
            </div>
        </div>
        <div class="text-center text-xs text-gray-400 border-t border-gray-100 pt-8">
            © 2026 LOKALKARYA. All rights reserved.
        </div>
    </footer>
    <script>
        // The javascript was for old buttons. Filter links are now standard anchor tags.
    </script>

</body>

</html>
