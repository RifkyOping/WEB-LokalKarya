<?php
// 1. Tampilkan Error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Arahkan semua cache ke memori sementara (/tmp) Vercel
$tmp = '/tmp';
$_ENV['APP_SERVICES_CACHE'] = "$tmp/services.php";
$_ENV['APP_PACKAGES_CACHE'] = "$tmp/packages.php";
$_ENV['APP_CONFIG_CACHE'] = "$tmp/config.php";
$_ENV['APP_ROUTES_CACHE'] = "$tmp/routes.php";
$_ENV['APP_EVENTS_CACHE'] = "$tmp/events.php";
$_ENV['VIEW_COMPILED_PATH'] = $tmp;

putenv("APP_SERVICES_CACHE=$tmp/services.php");
putenv("APP_PACKAGES_CACHE=$tmp/packages.php");
putenv("APP_CONFIG_CACHE=$tmp/config.php");
putenv("APP_ROUTES_CACHE=$tmp/routes.php");
putenv("APP_EVENTS_CACHE=$tmp/events.php");
putenv("VIEW_COMPILED_PATH=$tmp");

try {
    // 3. Panggil Composer
    require __DIR__.'/../vendor/autoload.php';

    // 4. Panggil aplikasi Laravel
    $app = require_once __DIR__.'/../bootstrap/app.php';

    // 5. MENGATASI READ-ONLY: Pindahkan paksa folder 'storage' ke /tmp
    $app->useStoragePath($tmp);

    // 6. Jalankan aplikasi (Deteksi Otomatis Laravel 10 vs Laravel 11/12)
    if (method_exists($app, 'handleRequest')) {
        // Mode Laravel 11+
        $app->handleRequest(Illuminate\Http\Request::capture());
    } else {
        // Mode Laravel 10 ke bawah
        $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
        $request = Illuminate\Http\Request::capture();
        $response = $kernel->handle($request);
        $response->send();
        $kernel->terminate($request, $response);
    }
} catch (\Throwable $e) {
    // 7. Jika masih crash, tangkap dan tampilkan di layar putih website!
    echo "<h1 style='color:red; font-family:sans-serif;'>🚨 Vercel PHP Crash Report</h1>";
    echo "<p style='font-family:sans-serif; font-size: 18px;'><strong>Pesan:</strong> " . $e->getMessage() . "</p>";
    echo "<p style='font-family:sans-serif;'><strong>Lokasi:</strong> " . $e->getFile() . " (Baris: " . $e->getLine() . ")</p>";
}