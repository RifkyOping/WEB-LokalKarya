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
        <div class="flex min-h-screen">
            @include('layouts.navigation')

            <div class="flex-1 flex flex-col min-w-0">
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
