<?php
// Mencegah Vercel mengembalikan status 500
http_response_code(200);

echo "<html><body style='font-family:sans-serif; padding: 30px;'>";
echo "<h1 style='color:green;'>✅ Jembatan Vercel-PHP Berhasil Menyala!</h1>";
echo "<p>Jika Anda melihat halaman ini, berarti masalahnya BUKAN pada Vercel, melainkan ada file penting Laravel yang tidak ikut ter-upload atau ter-install.</p>";
echo "<hr>";
echo "<h3>Hasil Pemindaian Server:</h3>";
echo "<ul>";

// 1. Cek Versi PHP
echo "<li><strong>Versi PHP Vercel:</strong> " . phpversion() . "</li>";

// 2. Cek Folder Vendor (Kunci Utama)
$vendorPath = __DIR__ . '/../vendor/autoload.php';
if (file_exists($vendorPath)) {
    echo "<li style='color:green;'><strong>Dependensi Composer (vendor/):</strong> AMAN TERSEDIA</li>";
} else {
    echo "<li style='color:red;'><strong>Dependensi Composer (vendor/):</strong> KOSONG / HILANG! (Ini penyebab utama Error 500 Anda!)</li>";
}

// 3. Cek public/index.php
$publicPath = __DIR__ . '/../public/index.php';
if (file_exists($publicPath)) {
    echo "<li style='color:green;'><strong>File public/index.php:</strong> AMAN TERSEDIA</li>";
} else {
    echo "<li style='color:red;'><strong>File public/index.php:</strong> HILANG!</li>";
}

echo "</ul>";
echo "<hr>";
echo "<p><em>Tolong beritahu saya apa hasil yang berwarna MERAH di layar Anda.</em></p>";
echo "</body></html>";
exit; // Hentikan eksekusi di sini agar Laravel tidak terpanggil