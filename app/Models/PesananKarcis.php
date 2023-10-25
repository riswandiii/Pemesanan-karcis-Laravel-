<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananKarcis extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke table user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel karcis
    public function karcis()
    {
        return $this->belongsTo(Karcis::class);
    }

}
