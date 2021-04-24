<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AnuncioUsuarioController extends Controller
{
    public function index()
    {
        return view('usuario.anuncio.index', ['anuncios' => Anuncio::where('usuario_id', Auth::id())->get()]);
    }

    public function create()
    {
        return view('usuario.anuncio.create', ['categorias' => Categoria::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required'],
            'descricao' => ['required'],
            'categoria' => ['required'],
        ]);

        if ($request->hasFile('foto_anuncio') && $request->file('foto_anuncio')->isValid()) {
            $extensao = $request->foto_anuncio->extension();

            $nome_imagem = 'foto_anuncio_' . str_replace(' ', '_', $request->nome) . '_' . Str::random(25) . '.' . $extensao;

            $upload = $request->foto_anuncio->storeAs('usuarios/anuncio', $nome_imagem);

            if (!$upload) return back()->withErrors([
                'foto_anuncio', 'Falha ao enviar imagem'
            ]);
        }

        $anuncio = Anuncio::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'usuario_id' => Auth::id(),
            'categoria_id' => $request->categoria,
            'foto_anuncio' => $nome_imagem ?? null,
        ]);

        //Adicionar verificação de email
        dd($anuncio, Anuncio::all());
    }

    public function show(Anuncio $anuncio)
    {
    }

    public function edit(Anuncio $anuncio)
    {
    }

    public function update(Request $request, Anuncio $anuncio)
    {
    }

    public function destroy(Anuncio $anuncio)
    {
    }
}
