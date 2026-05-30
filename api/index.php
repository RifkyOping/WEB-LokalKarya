<?php

// 1. Tampilkan semua error ke layar agar tidak ada yang tersembunyi
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Daftar sub-folder yang WAJIB ada agar Laravel tidak crash
$compiledViewPath = '/tmp/framework/views';
$cachePath = '/tmp/framework/cache';
$cacheDataPath = '/tmp/framework/cache/data';
$sessionPath = '/tmp/framework/sessions';
$logPath = '/tmp/logs';

$directories = [
    $compiledViewPath,
    $cachePath,
    $cacheDataPath,
    $sessionPath,
    $logPath
];

// 3. Bangun foldernya jika belum ada di server Vercel
foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// 4. Pastikan Laravel menggunakan folder view yang baru saja kita buat
$_ENV['VIEW_COMPILED_PATH'] = $compiledViewPath;
putenv('VIEW_COMPILED_PATH=' . $compiledViewPath);

// 5. Nyalakan mesin Laravel
try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    // Jika masih crash, tampilkan pesan aslinya ke layar putih!
    echo "<h1 style='color:red;'>🚨 Error Vercel:</h1>";
    echo "<p><strong>Pesan:</strong> " . $e->getMessage() . "</p>";
    echo "<p><strong>Lokasi:</strong> " . $e->getFile() . " (Baris: " . $e->getLine() . ")</p>";
    echo "<hr>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}