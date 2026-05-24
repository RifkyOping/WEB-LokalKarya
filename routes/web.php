<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerProfileController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $role = Auth::user()->role;

    if ($role === 'admin') {
        return view('admin.dashboard');
    } elseif ($role === 'seller') {
        return view('seller.dashboard');
    }
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/seller/dashboard', [SellerController::class, 'index'])->name('seller.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/seller/produk', [ProdukController::class, 'index'])->name('produk.seller');

    Route::get('/seller/profil', [SellerProfileController::class, 'edit'])->name('profile.seller');
    Route::patch('/seller/profil', [SellerProfileController::class, 'update'])->name('update.seller');
    Route::delete('/seller/profile', [SellerProfileController::class, 'destroy'])->name('destroy.seller');
    Route::patch('/seller/profile', [SellerProfileController::class, 'updateWhatsapp'])->name('seller.whatsapp.update');
    Route::patch('/seller/profile/details', [SellerProfileController::class, 'updateDetails'])->name('seller.profile.details');
    Route::patch('/seller/profile/photo', [SellerProfileController::class, 'updatePhoto'])->name('seller.profile.photo');
    Route::post('/seller/profile/portfolio', [SellerProfileController::class, 'addPortfolio'])->name('seller.portfolio.add');
    Route::delete('/seller/profile/portfolio/{index}', [SellerProfileController::class, 'deletePortfolio'])->name('seller.portfolio.delete');

    Route::get('/seller/create', [SellerController::class, 'create'])->name('seller.create');

    Route::get('/admin/seller', [AdminController::class, 'seller'])->name('admin.seller');
    Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin.produk');

});

Route::get('/seller/show', [SellerController::class, 'show'])->name('seller.show');

require __DIR__.'/auth.php';
