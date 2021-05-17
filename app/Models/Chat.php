<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'destinatario_id',
        'remetente_id',
        'mensagem',
        'visto'
    ];

    public function destinatario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function remetente()
    {
        return $this->belongsTo(Usuario::class);
    }
}
