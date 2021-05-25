<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnuncioRequest;
use App\Models\Anuncio;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnuncioController extends Controller
{

    private function editarFotoAnuncio(Request $request, $id)
    {
        if ($id) {
            $anuncio = Anuncio::select('foto_anuncio')->where('id', $id)->first();

            if ($anuncio->foto_anuncio)
                Storage::delete($anuncio->foto_anuncio);
        }
        if ($request->hasFile('foto_anuncio') && $request->file('foto_anuncio')->isValid())
            $nome_imagem = Storage::put('anuncio', $request->foto_anuncio);
        else return false;

        Anuncio::where('id', $id)->update([
            'foto_anuncio' => $nome_imagem ?? null,
        ]);
        return true;
    }

    public function index()
    {
        return view('dashboard.profissional.anuncio.index', ['anuncios' => Anuncio::where('usuario_id', Auth::id())->get()]);
    }


    public function show($id)
    {
        if (Route::currentRouteName() === 'auth.profissional.anuncio.show')
            return view('dashboard.profissional.anuncio.show', ['anuncio' => Anuncio::where('id', $id)->first()]);
        else if (Route::currentRouteName() === 'anuncio.show')
            return view('anuncio.show', [
                'anuncio' => Anuncio::where('id', $id)->first(),
                'usuario' => Usuario::where('id', Auth::id())->first()
            ]);
    }

    public function create()
    {
        return view('dashboard.profissional.anuncio.create', ['categorias' => Categoria::all()]);
    }

    public function store(AnuncioRequest $request)
    {

        $request->validated();

        $id = Anuncio::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'usuario_id' => Auth::id(),
            'categoria_id' => $request->categoria,
            'foto_anuncio' => $nome_imagem ?? null,
        ])->id;

        $this->editarFotoAnuncio($request, $id);

        return redirect()->route('dashboard.profissional.anuncio.index')->with('success', 'Anúncio criado com sucesso');
    }

    public function edit($id)
    {
        return view('dashboard.profissional.anuncio.edit', ['anuncio' => Anuncio::where('id', $id)->first(), 'categorias' => Categoria::all()]);
    }

    public function update(AnuncioRequest $request, $id)
    {
        $this->editarFotoAnuncio($request, $id);

        $request->validated();

        Anuncio::where('id', $id)->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'categoria_id' => $request->categoria,
            'preco' => $request->preco,
        ]);

        return redirect()->route('dashboard.profissional.anuncio.index')->with('success', 'Anúncio editado com sucesso');
    }

    public function destroy(Request $request)
    {
        Pedido::where('anuncio_id', $request->id)->delete();
        Anuncio::where('id', $request->id)->delete();

        return redirect()->route('dashboard.profissional.anuncio.index')->with('error', 'Anúncio deletado com sucesso');
    }
}
