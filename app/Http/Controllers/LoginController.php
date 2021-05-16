<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->tipo == 1)
                return redirect()->route('dashboard.profissional.index');
            return redirect()->route('dashboard.cliente.index');
        }
        return view('dashboard.login');
    }

    public function authenticate(Request $request)
    {
        $usuario = Usuario::select('id', 'tipo')->where('email', $request->email)->where('senha', md5($request->senha))->first();

        if ($usuario && Auth::loginUsingId($usuario->id)) {
            $request->session()->regenerate();

            if ($usuario->tipo == 1)
                return redirect()->route('dashboard.profissional.index');
            else
                return redirect()->route('dashboard.cliente.index');
        }


        return back()->with('error', 'Erro ao fazer login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
