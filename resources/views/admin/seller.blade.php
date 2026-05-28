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

                    @if(session('success'))
                    <div class="p-4 bg-green-50 border border-green-200 rounded-2xl flex items-center gap-3 text-green-700 mb-6">
                        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm font-bold">{{ session('success') }}</span>
                    </div>
                    @endif

                    @forelse($sellers as $seller)
                    <div
                        class="bg-white border border-gray-100 p-6 rounded-[2rem] shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">

                        <div class="w-32">
                            <h4 class="text-xs font-bold text-gray-500 mb-2">Profile</h4>
                            <img src="{{ $seller->foto ? asset('storage/' . $seller->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($seller->user->name ?? 'Seller') . '&background=4F46E5&color=fff' }}"
                                alt="Profile"
                                class="w-16 h-16 rounded-2xl object-cover border border-gray-200 shadow-sm">
                        </div>

                        <div class="w-48">
                            <h4 class="text-xs font-bold text-gray-500 mb-2">Nama Seller</h4>
                            <p class="font-extrabold text-gray-900 text-sm">{{ $seller->user->name ?? '-' }}</p>
                        </div>

                        <div class="flex-1">
                            <h4 class="text-xs font-bold text-gray-500 mb-2">Email</h4>
                            <p class="font-bold text-gray-900 text-sm">{{ $seller->user->email ?? '-' }}</p>
                        </div>

                        <div class="w-40">
                            <h4 class="text-xs font-bold text-gray-500 mb-2">Nomor WhatsApp</h4>
                            <p class="font-bold text-gray-900 text-sm">{{ $seller->nomor_whatsapp }}</p>
                        </div>

                        <div class="w-32">
                            <h4 class="text-xs font-bold text-gray-500 mb-2">Status</h4>
                            @if($seller->status_verifikasi === 'diterima')
                                <span class="inline-flex items-center gap-1 text-xs font-bold text-green-600 bg-green-50 px-3 py-1.5 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                    Disetujui
                                </span>
                            @elseif($seller->status_verifikasi === 'ditolak')
                                <span class="inline-flex items-center gap-1 text-xs font-bold text-red-600 bg-red-50 px-3 py-1.5 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                    Ditolak
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 text-xs font-bold text-yellow-600 bg-yellow-50 px-3 py-1.5 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                    Menunggu
                                </span>
                            @endif
                        </div>

                        <div class="w-48 text-center">
                            <h4 class="text-xs font-bold text-gray-500 mb-2">Aksi</h4>
                            @if($seller->status_verifikasi === 'menunggu')
                            <div class="flex items-center justify-center gap-2">
                                <form action="{{ route('admin.seller.setujui', $seller->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-3.5 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">
                                        Setujui
                                    </button>
                                </form>
                                <form action="{{ route('admin.seller.tolak', $seller->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-3.5 py-2 rounded-xl text-xs font-bold shadow-sm transition-all active:scale-95">
                                        Tolak
                                    </button>
                                </form>
                            </div>
                            @elseif($seller->status_verifikasi === 'diterima')
                                <form action="{{ route('admin.seller.tolak', $seller->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-bold transition-all">
                                        Batalkan & Tolak
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('admin.seller.setujui', $seller->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-green-600 hover:text-green-800 text-xs font-bold transition-all">
                                        Setujui Kembali
                                    </button>
                                </form>
                            @endif
                        </div>

                    </div>
                    @empty
                    <div class="bg-white border border-gray-100 p-8 rounded-[2rem] text-center text-gray-400 shadow-sm">
                        <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <p class="font-semibold text-gray-500 text-sm">Tidak ada pendaftaran akun seller</p>
                        <p class="text-xs text-gray-400 mt-1">Akun seller baru yang melengkapi profil akan muncul di sini.</p>
                    </div>
                    @endforelse

                </div>
            </main>

        </div>
    </div>
</body>

</html>
