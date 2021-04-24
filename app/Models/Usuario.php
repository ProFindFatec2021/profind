<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['nome', 'telefone', 'email', 'senha', 'tipo', 'foto_perfil'];

    protected $hidden = [
        'senha'
    ];
}
