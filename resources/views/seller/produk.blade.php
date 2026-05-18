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
                        Produk & Jasa
                    </h2>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto">
                <div class="max-w-[1400px] mx-auto p-8 md:p-12">

                    <div class="bg-white rounded-[1.5rem] border border-gray-100 shadow-sm mb-8 p-5 flex items-center">
                        <a href="{{ route('seller.create') }}"
                            class="bg-[#4F46E5] hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-md shadow-indigo-600/20 transition-all hover:-translate-y-0.5 active:scale-95">
                            + Tambah Jasa
                        </a>
                    </div>

                    <div class="bg-white rounded-[1.5rem] border border-gray-100 shadow-sm mb-8 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse min-w-[1000px] table-fixed">
                                <thead>
                                    <tr class="border-b border-gray-100 bg-gray-50/30">
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-32">
                                            Thumbnail</th>
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-1/3">
                                            Nama Jasa</th>
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-1/5">
                                            Kategori</th>
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-1/5">
                                            Harga</th>
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-1/5">
                                            Status</th>
                                        <th
                                            class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide text-center w-48">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    <tr class="hover:bg-gray-50/80 transition-colors">
                                        <td class="px-6 py-4">
                                            <img src="https://placehold.co/150x150/e2e8f0/64748b?text=Poster"
                                                class="w-16 h-16 rounded-2xl object-cover border border-gray-100">
                                        </td>
                                        <td class="px-6 py-4 font-extrabold text-gray-900 text-sm break-words">
                                            Poster Event Kampus
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center justify-center px-4 py-1.5 bg-blue-50 text-blue-600 font-bold text-[11px] rounded-full">
                                                Desain Publikasi
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 font-extrabold text-[#4F46E5] text-sm">
                                            Rp75K
                                        </td>
                                        <td class="px-4 py-4">
                                            <span
                                                class="inline-flex items-center justify-center px-4 py-1.5 bg-green-50 text-green-600 font-bold text-[11px] rounded-full">
                                                Disetujui
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-3">
                                                <button
                                                    class="px-5 py-2.5 rounded-xl font-bold text-xs bg-white text-gray-700 border border-gray-200 hover:border-[#4F46E5] hover:text-[#4F46E5] transition-all active:scale-95">Edit</button>
                                                <button
                                                    class="px-5 py-2.5 rounded-xl font-bold text-xs bg-white text-gray-700 border border-gray-200 hover:border-red-600 hover:text-red-600 transition-all active:scale-95">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="bg-white rounded-[1.5rem] border border-gray-100 shadow-sm mb-8 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse min-w-[1000px] table-fixed">
                                <thead>
                                    <tr class="border-b border-gray-100 bg-gray-50/30">
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-32">
                                            Thumbnail</th>
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-1/3">
                                            Nama Jasa</th>
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-1/5">
                                            Kategori</th>
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-1/5">
                                            Harga</th>
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-1/5">
                                            Status</th>
                                        <th
                                            class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide text-center w-48">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    <tr class="hover:bg-gray-50/80 transition-colors">
                                        <td class="px-6 py-4">
                                            <img src="https://placehold.co/150x150/e2e8f0/64748b?text=UI"
                                                class="w-16 h-16 rounded-2xl object-cover border border-gray-100">
                                        </td>
                                        <td class="px-6 py-4 font-extrabold text-gray-900 text-sm break-words">
                                            UI Landing Page
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center justify-center px-4 py-1.5 bg-blue-50 text-blue-600 font-bold text-[11px] rounded-full">
                                                UI Design
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 font-extrabold text-[#4F46E5] text-sm">
                                            Rp150K
                                        </td>
                                        <td class="px-4 py-4">
                                            <span
                                                class="inline-flex items-center justify-center px-4 py-1.5 bg-yellow-50 text-yellow-600 font-bold text-[11px] rounded-full">
                                                Menunggu
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-3">
                                                <button
                                                    class="px-5 py-2.5 rounded-xl font-bold text-xs bg-white text-gray-700 border border-gray-200 hover:border-[#4F46E5] hover:text-[#4F46E5] transition-all active:scale-95">Edit</button>
                                                <button
                                                    class="px-5 py-2.5 rounded-xl font-bold text-xs bg-white text-gray-700 border border-gray-200 hover:border-red-600 hover:text-red-600 transition-all active:scale-95">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50/80 transition-colors">
                                        <td class="px-6 py-4">
                                            <img src="https://placehold.co/150x150/e2e8f0/64748b?text=Website"
                                                class="w-16 h-16 rounded-2xl object-cover border border-gray-100">
                                        </td>
                                        <td class="px-6 py-4 font-extrabold text-gray-900 text-sm break-words">
                                            Pembuatan Website Profile
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center justify-center px-4 py-1.5 bg-blue-50 text-blue-600 font-bold text-[11px] rounded-full">
                                                Web Development
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 font-extrabold text-[#4F46E5] text-sm">
                                            Rp500K
                                        </td>
                                        <td class="px-4 py-4">
                                            <span
                                                class="inline-flex items-center justify-center px-4 py-1.5 bg-yellow-50 text-yellow-600 font-bold text-[11px] rounded-full">
                                                Menunggu
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-3">
                                                <button
                                                    class="px-5 py-2.5 rounded-xl font-bold text-xs bg-white text-gray-700 border border-gray-200 hover:border-[#4F46E5] hover:text-[#4F46E5] transition-all active:scale-95">Edit</button>
                                                <button
                                                    class="px-5 py-2.5 rounded-xl font-bold text-xs bg-white text-gray-700 border border-gray-200 hover:border-red-600 hover:text-red-600 transition-all active:scale-95">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="bg-white rounded-[1.5rem] border border-gray-100 shadow-sm mb-8 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse min-w-[1000px] table-fixed">
                                <thead>
                                    <tr class="border-b border-gray-100 bg-gray-50/30">
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-32">
                                            Thumbnail</th>
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-1/3">
                                            Nama Jasa</th>
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-1/5">
                                            Kategori</th>
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-1/5">
                                            Harga</th>
                                        <th class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide w-1/5">
                                            Status</th>
                                        <th
                                            class="px-6 py-4 text-gray-500 font-bold text-[13px] tracking-wide text-center w-48">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    <tr class="hover:bg-gray-50/80 transition-colors">
                                        <td class="px-6 py-4">
                                            <img src="https://placehold.co/150x150/e2e8f0/64748b?text=Poster"
                                                class="w-16 h-16 rounded-2xl object-cover border border-gray-100">
                                        </td>
                                        <td class="px-6 py-4 font-extrabold text-gray-900 text-sm break-words">
                                            Poster Event Kampus
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center justify-center px-4 py-1.5 bg-blue-50 text-blue-600 font-bold text-[11px] rounded-full">
                                                Desain Publikasi
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 font-extrabold text-[#4F46E5] text-sm">
                                            Rp75K
                                        </td>
                                        <td class="px-4 py-4">
                                            <span
                                                class="inline-flex items-center justify-center px-4 py-1.5 bg-red-50 text-red-600 font-bold text-[11px] rounded-full">
                                                Ditolak
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-3">
                                                <button
                                                    class="px-5 py-2.5 rounded-xl font-bold text-xs bg-white text-gray-700 border border-gray-200 hover:border-[#4F46E5] hover:text-[#4F46E5] transition-all active:scale-95">Edit</button>
                                                <button
                                                    class="px-5 py-2.5 rounded-xl font-bold text-xs bg-white text-gray-700 border border-gray-200 hover:border-red-600 hover:text-red-600 transition-all active:scale-95">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
