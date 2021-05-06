<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Categoria;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AnuncioController extends Controller
{
    public function index()
    {
        return view('anuncio.index', ['anuncios' => Anuncio::all()]);
    }


    public function show($id)
    {
        if (Route::currentRouteName() === 'auth.profissional.anuncio.show')
            return view('auth.profissional.anuncio.show', ['anuncio' => Anuncio::where('id', $id)->first()]);
        else if (Route::currentRouteName() === 'anuncio.show')
            return view('anuncio.show', [
                'anuncio' => Anuncio::where('id', $id)->first(),
                'usuario' => Usuario::where('id', Auth::id())->first()
            ]);
    }

    public function indexPerfil()
    {
        return view('auth.profissional.anuncio.index', ['anuncios' => Anuncio::where('usuario_id', Auth::id())->get()]);
    }

    public function create()
    {
        return view('auth.profissional.anuncio.create', ['categorias' => Categoria::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required'],
            'descricao' => ['required'],
            'categoria' => ['required'],
        ]);

        // if ($request->hasFile('foto_anuncio') && $request->file('foto_anuncio')->isValid())
        // $nome_imagem = Storage::put('anuncio', $request->foto_perfil);

        Anuncio::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'usuario_id' => Auth::id(),
            'categoria_id' => $request->categoria,
            'foto_anuncio' => $nome_imagem ?? null,
        ]);

        return redirect()->route('dashboard.anuncio.index')->with('success', 'Anúncio criado com sucesso');
    }

    public function edit($id)
    {
        return view('auth.profissional.anuncio.edit', ['anuncio' => Anuncio::where('id', $id)->first(), 'categorias' => Categoria::all()]);
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

        return redirect()->route('dashboard.anuncio.index')->with('success', 'Anúncio editado com sucesso');
    }

    public function destroy(Request $request)
    {
        Anuncio::where('id', $request->id)->delete();

        return redirect()->route('dashboard.anuncio.index')->with('error', 'Anúncio deletado com sucesso');
    }
}
