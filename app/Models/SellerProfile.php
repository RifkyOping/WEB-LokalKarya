<?php

    namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerProfile extends Model
{
    // Tambahkan 'user_id' di dalam array ini
    protected $fillable = [
        'user_id', 
        'alamat', 
        'foto', 
        'link_portofolio', 
        'nomor_whatsapp', 
        'deskripsi',
        'bidang_keahlian',
        'status_verifikasi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'link_portofolio' => 'array',
        ];
    }
}