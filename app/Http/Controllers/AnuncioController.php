<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AnuncioController extends Controller
{
    public function index()
    {
        return view('anuncio.index', ['anuncios' => Anuncio::all()]);
    }


    public function show($id)
    {
        if (Route::currentRouteName() === 'usuario.perfil.anuncio.show')
            return view('usuario.perfil.anuncio.show', ['anuncio' => Anuncio::where('id', $id)->first()]);
        else if (Route::currentRouteName() === 'anuncio.show')
            return view('anuncio.show', ['anuncio' => Anuncio::where('id', $id)->first()]);
    }

    public function indexPerfil()
    {
        return view('usuario.perfil.anuncio.index', ['anuncios' => Anuncio::where('usuario_id', Auth::id())->get()]);
    }

    public function create()
    {
        return view('usuario.perfil.anuncio.create', ['categorias' => Categoria::all()]);
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

            $upload = $request->foto_anuncio->storeAs('anuncio', $nome_imagem);

            if (!$upload) return back()->withErrors([
                'foto_anuncio', 'Falha ao enviar imagem'
            ]);
        }

        Anuncio::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'usuario_id' => Auth::id(),
            'categoria_id' => $request->categoria,
            'foto_anuncio' => $nome_imagem ?? null,
        ]);

        return redirect()->route('usuario.perfil.anuncio.index');
    }

    public function edit($id)
    {
        return view('usuario.perfil.anuncio.edit', ['anuncio' => Anuncio::where('id', $id)->first(), 'categorias' => Categoria::all()]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => ['required'],
            'descricao' => ['required'],
            'categoria' => ['required'],
        ]);

        Anuncio::where('id', $id)->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'categoria_id' => $request->categoria,
        ]);

        return redirect()->route('usuario.perfil.anuncio.show', ['id' => $id]);
    }

    public function destroy(Anuncio $anuncio, $id)
    {
        $anuncio->where('id', $id)->delete();

        return redirect()->route('usuario.perfil.anuncio.index')->withErrors([
            'Anúncio deletado com sucesso'
        ]);
    }
}
