<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'anuncio_id',
        'profissional_id',
        'descricao',
        'foto_portfolio'
    ];

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }
}
