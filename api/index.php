<?php
// Memaksa PHP untuk menampilkan semua error ke layar
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Mencoba menyalakan mesin Laravel
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    // Jika crash, tangkap dan tampilkan pesan aslinya
    echo "<h1 style='color:red;'>🚨 Vercel PHP Fatal Error:</h1>";
    echo "<p><strong>Pesan:</strong> " . $e->getMessage() . "</p>";
    echo "<p><strong>Lokasi:</strong> " . $e->getFile() . " (Baris: " . $e->getLine() . ")</p>";
    echo "<hr>";
    echo "<h3>Stack Trace:</h3>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}