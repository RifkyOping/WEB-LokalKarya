<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerProfile extends Model
{
    protected $fillable = ['alamat', 'foto', 'link_portofolio', 'nomor_whatsapp', 'deskripsi'];
}
