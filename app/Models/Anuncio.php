<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'usuario_id', 'categoria_id', 'foto_anuncio'];

    public function categoria()
    {
        return $this->hasOne(Categoria::class);
    }
}
