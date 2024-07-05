<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = [
        'name',
        'address',
        'resep',
        'merk',
        'left_size',
        'left_type',
        'right_size',
        'right_type',
        'type',
        'harga',
        'diskon',
        'total',
        'vascout',
        'sisa',
    ];
}
