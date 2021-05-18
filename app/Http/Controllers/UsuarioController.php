<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Anuncio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{

    private function editarFotoPerfil(Request $request)
    {
        if ($request->hasFile('foto_perfil') && $request->file('foto_perfil')->isValid())
            $nome_imagem = Storage::put('usuarios/perfil', $request->foto_perfil);
        else return false;

        $usuario = Usuario::select('foto_perfil')->where('id', Auth::id())->first();

        if ($usuario->foto_perfil)
            Storage::delete($usuario->foto_perfil);


        Usuario::where('id', Auth::id())->update([
            'foto_perfil' => $nome_imagem ?? null,
        ]);
        return true;
    }

    public function index()
    {
        return view('usuario.index', ['usuarios' => Usuario::where('tipo', 1)->get()]);
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(StoreUsuarioRequest $request)
    {
        $request->validated();

        if ($request->hasFile('foto_perfil') && $request->file('foto_perfil')->isValid())
            $nome_imagem = Storage::put('usuarios/perfil', $request->foto_perfil);

        Usuario::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'senha' => md5($request->senha),
            'tipo' => $request->tipo,
            'foto_perfil' => $nome_imagem ?? null,
        ]);
        return redirect()->route('login');
    }

    public function perfil(Usuario $usuario)
    {
        $usuario = Usuario::where('id', Auth::id())->first();
        return view('dashboard.perfil.perfil', ['usuario' => $usuario]);
    }

    public function update(UpdateUsuarioRequest $request)
    {
        $this->editarFotoPerfil($request);

        $request->validated();

        if (!$request->tipo)
            Anuncio::where('usuario_id', Auth::id())->delete();

        Usuario::where('id', Auth::id())->update([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'tipo' => $request->tipo ? 1 : 0,
        ]);

        return redirect()->route('dashboard.perfil.perfil');
    }

    public function show($id)
    {
        $usuario = Usuario::where('id', $id)->first();
        return view('usuario.show', ['usuario' => $usuario]);
    }

    public function fotoPerfil(Request $request)
    {
        if ($this->editarFotoPerfil($request))
            return back()->with('success', 'Foto de perfil atualizada com sucesso');
        else return back()->with('error', 'Erro ao colocar foto de perfil');
    }

    public function destroy(Usuario $usuario)
    {
        Anuncio::where('usuario_id', Auth::id())->delete();
        Usuario::where('id', Auth::id())->delete();

        return redirect()->route('login')->withErrors([
            'Conta deletada com sucesso'
        ]);
    }
}
