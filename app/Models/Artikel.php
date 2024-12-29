<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{

    // Tentukan nama tabel secara eksplisit
    protected $table = 'artikel'; // Sesuaikan dengan nama tabel sebenarnya

    protected $fillable = [
        'id_artikel',
        'id_author',
        'penulis_ke',
    ];

}
