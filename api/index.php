<?php
// 1. Matikan mode sembunyi-sembunyi, paksa PHP menampilkan error ke layar
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Cegah Vercel kebingungan dengan memori lokal
$_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_ENV['APP_ROUTES_CACHE'] = '/tmp/routes.php';
$_ENV['APP_EVENTS_CACHE'] = '/tmp/events.php';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp';

try {
    // 3. Muat semua package PHP
    require __DIR__.'/../vendor/autoload.php';

    // 4. Nyalakan mesin utama Laravel
    $app = require_once __DIR__.'/../bootstrap/app.php';

    // 🔴 5. KUNCI UTAMA: Pindahkan paksa folder storage (logs, cache, dll) ke /tmp
    $app->useStoragePath('/tmp');

    // 6. Jalankan aplikasi
    $app->handleRequest(Illuminate\Http\Request::capture());
    
} catch (\Throwable $e) {
    // 7. Jika masih ada yang crash, tangkap dan tampilkan secara elegan
    echo "<h1 style='color:#ef4444; font-family:sans-serif;'>🚨 Vercel PHP Crash Report:</h1>";
    echo "<h3 style='font-family:sans-serif;'>" . get_class($e) . "</h3>";
    echo "<p style='font-family:sans-serif; font-size: 18px;'><strong>Pesan:</strong> " . $e->getMessage() . "</p>";
    echo "<p style='font-family:sans-serif;'><strong>Lokasi:</strong> " . $e->getFile() . " (Baris: " . $e->getLine() . ")</p>";
    echo "<hr><h4 style='font-family:sans-serif;'>Stack Trace:</h4>";
    echo "<pre style='background:#1f2937; color:#f3f4f6; padding:15px; border-radius:8px; overflow-x:auto;'>" . $e->getTraceAsString() . "</pre>";
}