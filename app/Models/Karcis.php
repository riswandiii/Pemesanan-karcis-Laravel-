<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karcis extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke table pesanan karcis
    public function pesananKarcis()
    {
        return $this->hasMany(PesananKarcis::class);
    }

}
