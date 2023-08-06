<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;
    protected $table = 'catatans';
    protected $fillable = [
        'user_id',
        'tanggal',
        'jenis',
        'nominal',
        'harga_asli',
        'harga_jual',
        'harga_bayar',
        'nama',
        'is_bayar',
        'metode_id',
        'wallet_id',
        'keuntungan',
    ];
}
