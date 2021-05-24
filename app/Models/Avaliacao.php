<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'anuncio_id',
        'profissional_id',
        'avaliacao',
        'anuncio_id'
    ];

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function profissional()
    {
        return $this->belongsTo(Usuario::class);
    }
}
