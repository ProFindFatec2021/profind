<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaAnuncio extends Model
{
    use HasFactory;

    protected $fillable = [
        'anuncio_id',
        'foto'
    ];
}
