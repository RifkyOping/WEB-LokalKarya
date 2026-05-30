<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 font-sans antialiased text-gray-900">
        <div class="flex min-h-screen" x-data="{ sidebarOpen: false }">
            @include('layouts.navigation')

            <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
                <!-- Mobile top bar -->
                <div class="lg:hidden bg-white border-b border-gray-100 flex items-center justify-between p-4 sticky top-0 z-30">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-lg shadow-lg">L</div>
                        <span class="font-extrabold text-lg tracking-tight uppercase">Lokalkarya</span>
                    </div>
                    <button @click="sidebarOpen = true" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 p-2 rounded-md">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white border-b border-gray-100 sticky top-0 z-20 shadow-sm">
                        <div class="max-w-6xl mx-auto px-8 py-5">
                            <h2 class="text-xl font-extrabold text-gray-900 tracking-tight">
                                {{ $header }}
                            </h2>
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1 overflow-y-auto">
                    <div class="max-w-6xl mx-auto p-8 md:p-12 lg:p-16">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
