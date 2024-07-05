<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTipe extends Model
{
    use HasFactory;

    protected $table = 't_tipe';
    protected $fillable = [
        'nama_type',
    ];
}
