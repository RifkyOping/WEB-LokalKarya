<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // 1. Tambahkan baris ini

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     // 2. Paksa HTTPS jika aplikasi berjalan di server Vercel
    //     if (env('APP_ENV') !== 'local') {
    //         URL::forceScheme('https');
    //     }
    // }
    public function boot(): void
    {
        // Paksa HTTPS HANYA jika server mendeteksi Vercel
        if (isset($_SERVER['VERCEL'])) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}