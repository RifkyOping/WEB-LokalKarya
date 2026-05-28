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

                    @if(session('success'))
                        <div
                            class="p-4 bg-green-50 border border-green-200 rounded-2xl flex items-center gap-3 text-green-700 mb-6">
                            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-bold">{{ session('success') }}</span>
                        </div>
                    @endif

                    @forelse($produks as $produk)
                        <div
                            class="bg-white border border-gray-100 p-6 rounded-[2rem] shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">

                            <div class="w-32">
                                <h4 class="text-xs font-bold text-gray-500 mb-2">Thumbnail</h4>
                                <img src="{{ $produk->gambar_produk ? asset('storage/' . $produk->gambar_produk) : 'https://placehold.co/150x150/e2e8f0/64748b?text=No+Image' }}"
                                    alt="Thumbnail"
                                    class="w-16 h-12 rounded-xl object-cover border border-gray-200 shadow-sm">
                            </div>

                            <div class="w-48">
                                <h4 class="text-xs font-bold text-gray-500 mb-2">Nama Seller</h4>
                                <p class="font-extrabold text-gray-900 text-sm">{{ $produk->user->name ?? '-' }}</p>
                            </div>

                            <div class="flex-1">
                                <h4 class="text-xs font-bold text-gray-500 mb-2">Nama Jasa / Produk</h4>
                                <p class="font-extrabold text-gray-900 text-sm">{{ $produk->nama_produk }}</p>
                            </div>

                            <div class="w-40">
                                <h4 class="text-xs font-bold text-gray-500 mb-2">Kategori</h4>
                                <div class="flex justify-start">
                                    <span
                                        class="bg-indigo-50 text-indigo-600 px-4 py-1.5 rounded-full text-[11px] font-bold">
                                        {{ ucwords(str_replace('-', ' ', $produk->kategori)) }}
                                    </span>
                                </div>
                            </div>

                            <div class="w-32">
                                <h4 class="text-xs font-bold text-gray-500 mb-2">Status</h4>
                                @if($produk->status_verifikasi === 'diterima')
                                    <div class="flex justify-start items-center gap-2 text-green-500">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                        <span class="font-bold text-xs">Disetujui</span>
                                    </div>
                                @elseif($produk->status_verifikasi === 'ditolak')
                                    <div class="flex justify-start items-center gap-2 text-red-500">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                        <span class="font-bold text-xs">Ditolak</span>
                                    </div>
                                @else
                                    <div class="flex justify-start items-center gap-2 text-yellow-500">
                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                        <span class="font-bold text-xs">Tunggu</span>
                                    </div>
                                @endif
                            </div>

                            <div class="w-48 text-center">
                                <h4 class="text-xs font-bold text-gray-500 mb-2">Aksi</h4>
                                <div class="flex items-center justify-center gap-2">

                                    @if($produk->status_verifikasi === 'menunggu')
                                        <form action="{{ route('admin.produk.setujui', $produk->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">
                                                Setujui
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.produk.tolak', $produk->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">
                                                Tolak
                                            </button>
                                        </form>

                                    @elseif($produk->status_verifikasi === 'ditolak')
                                        <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-white border border-gray-200 text-red-600 hover:bg-red-50 px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">
                                                Hapus
                                            </button>
                                        </form>

                                    @elseif($produk->status_verifikasi === 'diterima')
                                        <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-white border border-gray-200 text-red-600 hover:bg-red-50 px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">
                                                Hapus
                                            </button>
                                        </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white border border-gray-100 p-8 rounded-[2rem] text-center text-gray-400 shadow-sm">
                            <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <p class="font-semibold text-gray-500 text-sm">Tidak ada jasa atau produk</p>
                            <p class="text-xs text-gray-400 mt-1">Produk baru yang diajukan oleh seller akan muncul di
                                sini.</p>
                        </div>
                    @endforelse

                </div>
            </main>

        </div>
    </div>
</body>

</html>