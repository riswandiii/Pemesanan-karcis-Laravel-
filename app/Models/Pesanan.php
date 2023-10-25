<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke table user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke table pesanan detail
    public function pesananDetail()
    {
        return $this->hasMany(PesananDetail::class);
    }

    
    // Relasi ke table bukti pembayaran
    public function buktiPembayaran()
    {
        return $this->hasMany(BuktiPembayaran::class);
    }

}
