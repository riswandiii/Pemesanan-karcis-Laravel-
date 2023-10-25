<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke table pesanan detail
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

}
