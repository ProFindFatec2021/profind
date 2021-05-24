<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvaliacaoController extends Controller
{
    public function index()
    {
        $avaliacoes = Avaliacao::where('profissional_id', Auth::id())->get();
        return view('dashboard.profissional.avaliacao.index', ['avaliacoes' => $avaliacoes]);
    }
}
