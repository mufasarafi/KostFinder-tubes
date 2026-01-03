<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    protected $table = 'kosts'; // opsional, tapi aman

    protected $fillable = [
        'nama_kost',
        'harga',
        'jarak',
        'no_pemilik',
        'kondisi',
        'fasilitas',
        'status',
        'alamat'
    ];
}
