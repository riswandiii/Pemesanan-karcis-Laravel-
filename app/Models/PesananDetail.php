<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke table pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    // Relasi ke table fasilitas
    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }


}
