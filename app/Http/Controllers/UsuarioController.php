<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuario.index', ['usuarios' => Usuario::where('tipo', 1)->get()]);
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required'],
            'telefone' => ['required', 'unique:usuarios', 'min:14', 'max:15'],
            'email' => ['required', 'unique:usuarios'],
            'senha' => ['required', 'min:8', 'max:15'],
        ]);

        if ($request->hasFile('foto_perfil') && $request->file('foto_perfil')->isValid()) {
            $extensao = $request->foto_perfil->extension();

            $nome_imagem = 'foto_perfil_' . str_replace(' ', '_', $request->nome) . '_' . Str::random(25) . '.' . $extensao;

            $upload = $request->foto_perfil->storeAs('usuarios/perfil', $nome_imagem);

            if (!$upload) return back()->withErrors([
                'foto_perfil', 'Falha ao enviar imagem'
            ]);
        }

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
        return view('usuario.perfil', ['usuario' => $usuario]);
    }

    public function edit(Usuario $usuario)
    {
        $usuario = $usuario->where('id', Auth::id())->first();
        return view('usuario.edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nome' => ['required'],
            'telefone' => ['required', 'unique:usuarios,telefone,' . Auth::id(), 'min:14', 'max:15'],
            'email' => ['required', 'unique:usuarios,email,' . Auth::id()],
        ]);

        Usuario::where('id', Auth::id())->update([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'tipo' => $request->tipo ? 1 : 0,
        ]);

        return redirect()->route('usuario.perfil');
    }

    public function destroy(Usuario $usuario)
    {
        Anuncio::where('usuario_id', Auth::id())->delete();
        Usuario::where('id', Auth::id())->delete();

        return redirect()->route('login')->withErrors([
            'Conta deletada com sucesso'
        ]);
    }

    public function show($id)
    {
        $usuario = Usuario::where('id', $id)->first();
        return view('usuario.show', ['usuario' => $usuario]);
    }

    public function indexAnuncios($id)
    {
        $anuncios = Anuncio::where('usuario_id', $id)->get();
        $usuario = Usuario::where('id', $id)->first();
        return view('usuario.anuncio.index', ['anuncios' => $anuncios, 'nome' => $usuario->nome]);
    }
}
