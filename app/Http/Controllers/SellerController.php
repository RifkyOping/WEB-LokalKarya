<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::where('user_id', Auth::id())
            ->where('status_verifikasi', 'diterima')
            ->where('status', 'aktif')
            ->get();

        return view("seller.dashboard", compact('produks'));
    }



    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        return view("detailProduk");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
