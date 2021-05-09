<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        if (Auth::check())
            return redirect()->route('dashboard.profissional.index');
        return view('usuario.login');
    }

    public function authenticate(Request $request)
    {
        $usuario = Usuario::select('id')->where('email', $request->email)->where('senha', md5($request->senha))->first();

        if ($usuario && Auth::loginUsingId($usuario->id)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard.profissional.index');
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
