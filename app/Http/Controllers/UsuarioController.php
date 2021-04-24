<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
    public function index()
    {
        dd(Usuario::all());
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required'],
            'telefone' => ['required', 'unique:usuarios'],
            'email' => ['required', 'unique:usuarios'],
            'senha' => ['required'],
        ]);

        if ($request->hasFile('foto_perfil') && $request->file('foto_perfil')->isValid()) {
            $extensao = $request->foto_perfil->extension();

            $nome_imagem = 'foto_perfil_' . str_replace(' ', '_', $request->nome) . '_' . Str::random(25) . '.' . $extensao;

            $upload = $request->foto_perfil->storeAs('usuarios/perfil', $nome_imagem);

            if (!$upload) return back()->withErrors([
                'foto_perfil', 'Falha ao enviar imagem'
            ]);
        }

        $usuario = Usuario::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'senha' => md5($request->senha),
            'tipo' => $request->tipo,
            'foto_perfil' => $nome_imagem ?? null,
        ]);

        //Adicionar verificação de email
        dd($usuario, Usuario::all());
    }

    public function show(Usuario $usuario)
    {
        $usuario = $usuario->where('id', Auth::id())->first();
        return view('usuario.show', ['usuario' => $usuario]);
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
            'telefone' => ['required', 'unique:usuarios,telefone,' . Auth::id()],
            'email' => ['required', 'unique:usuarios,email,' . Auth::id()],
        ]);

        Usuario::where('id', Auth::id())->update([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);
        return redirect()->route('usuario.show');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario = $usuario->where('id', Auth::id())->delete();

        return redirect()->route('login')->withErrors([
            'Conta deletada com sucesso'
        ]);
    }
}
