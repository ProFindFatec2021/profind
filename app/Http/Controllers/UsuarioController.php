<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(Usuario::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

            $upload = $request->foto_perfil->storeAs('usuarios', $nome_imagem);

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

        dd($usuario, Usuario::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return 'aa';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
