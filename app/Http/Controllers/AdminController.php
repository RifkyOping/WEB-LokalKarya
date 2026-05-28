<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SellerProfile;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalSeller = User::query()->where('role', 'seller')->count();
        $pendingSeller = SellerProfile::query()->where('status_verifikasi', 'menunggu')->count();
        $pendingProduk = Produk::query()->where('status_verifikasi', 'menunggu')->count();

        // Ambil aktivitas terbaru (5 seller baru & 5 produk baru)
        $recentSellers = User::query()->where('role', 'seller')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($user) {
                return [
                    'tipe' => 'seller',
                    'judul' => 'Pengguna Baru Mendaftar',
                    'deskripsi' => $user->name . ' mendaftar sebagai kreator baru.',
                    'waktu' => $user->created_at,
                ];
            });

        $recentProduks = Produk::query()->with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($produk) {
                $sellerName = $produk->user ? $produk->user->name : 'Kreator';
                return [
                    'tipe' => 'produk',
                    'judul' => 'Jasa Baru Ditambahkan',
                    'deskripsi' => $produk->nama_produk . ' ditambahkan oleh ' . $sellerName . ' dan menunggu verifikasi.',
                    'waktu' => $produk->created_at,
                ];
            });

        $recentActivities = $recentSellers->concat($recentProduks)
            ->sortByDesc('waktu')
            ->take(5);

        return view('admin.dashboard', compact('totalSeller', 'pendingSeller', 'pendingProduk', 'recentActivities'));
    }

    public function seller()
    {
        // Menampilkan seller yang memiliki profile, diurutkan dari yang statusnya 'menunggu' terlebih dahulu
        $sellers = SellerProfile::with('user')
            ->orderByRaw("status_verifikasi = 'menunggu' DESC")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.seller', compact('sellers'));
    }

    public function produk()
    {
        // Menampilkan semua produk beserta data user pembuatnya, diurutkan dari 'menunggu'
        $produks = Produk::with('user')
            ->orderByRaw("status_verifikasi = 'menunggu' DESC")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.produk', compact('produks'));
    }

    // Action untuk menyetujui seller
    public function setujuiSeller(SellerProfile $sellerProfile)
    {
        $sellerProfile->update(['status_verifikasi' => 'diterima']);
        return redirect()->back()->with('success', 'Akun Seller berhasil disetujui.');
    }

    // Action untuk menolak seller
    public function tolakSeller(SellerProfile $sellerProfile)
    {
        $sellerProfile->update(['status_verifikasi' => 'ditolak']);
        return redirect()->back()->with('success', 'Akun Seller berhasil ditolak.');
    }

    // Action untuk menyetujui produk
    public function setujuiProduk(Produk $produk)
    {
        $produk->update(['status_verifikasi' => 'diterima']);
        return redirect()->back()->with('success', 'Jasa atau Produk berhasil disetujui.');
    }

    // Action untuk menolak produk
    public function tolakProduk(Produk $produk)
    {
        $produk->update(['status_verifikasi' => 'ditolak']);
        return redirect()->back()->with('success', 'Jasa atau Produk berhasil ditolak.');
    }

    // Action untuk menghapus produk
    public function destroyProduk(Produk $produk)
    {
        if ($produk->gambar_produk && \Illuminate\Support\Facades\Storage::disk('public')->exists($produk->gambar_produk)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($produk->gambar_produk);
        }
        $produk->delete();
        return redirect()->back()->with('success', 'Jasa atau Produk berhasil dihapus.');
    }
}
