<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // Hanya field yang BOLEH diisi oleh Seller melalui form
    protected $fillable = [
        'nama_produk',
        'gambar_produk',
        'harga',
        'deskripsi',
        'kategori',
        'status',
    ];

    // Field sensitif yang TIDAK BOLEH diubah oleh Seller via mass assignment
    // user_id & status_verifikasi harus di-set secara eksplisit di Controller


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
