<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relasi ke table pesananDetail
    public function pesananDetail()
    {
        return $this->hasMany(PesananDetail::class);
    }

}
