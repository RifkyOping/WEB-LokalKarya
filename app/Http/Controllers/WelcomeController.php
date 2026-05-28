<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with(['user.sellerProfile'])
            ->where('status', 'aktif')
            ->where('status_verifikasi', 'diterima');

        $search = $request->input('search');
        $filterType = $request->input('filter_type', 'semua');
        $kategori = $request->input('kategori');

        if ($search) {
            if ($filterType === 'judul') {
                $query->where('nama_produk', 'like', '%' . $search . '%');
            } elseif ($filterType === 'kategori') {
                $query->where('kategori', 'like', '%' . $search . '%');
            } elseif ($filterType === 'seller') {
                $query->whereHas('user', function($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            } else { // 'semua'
                $query->where(function($q) use ($search) {
                    $q->where('nama_produk', 'like', '%' . $search . '%')
                      ->orWhere('kategori', 'like', '%' . $search . '%')
                      ->orWhereHas('user', function($subQ) use ($search) {
                          $subQ->where('name', 'like', '%' . $search . '%');
                      });
                });
            }
        }

        if ($kategori && $kategori !== 'Semua') {
            $query->where('kategori', 'like', '%' . $kategori . '%');
        }

        $produks = $query->latest()->get();

        return view('welcome', compact('produks', 'search', 'filterType', 'kategori'));
    }

    public function show($id)
    {
        $produk = Produk::with(['user.sellerProfile'])->findOrFail($id);
        
        // Prevent showing inactive/unverified products unless the user is the owner or admin
        if ($produk->status !== 'aktif' || $produk->status_verifikasi !== 'diterima') {
            if (auth()->check() && (auth()->id() === $produk->user_id || auth()->user()->role === 'admin')) {
                // allow
            } else {
                abort(404);
            }
        }

        return view('detailProduk', compact('produk'));
    }
}
