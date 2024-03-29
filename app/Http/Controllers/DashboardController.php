<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->tipo == 1) {
            $totalPedidosPendentes = Pedido::where([
                ['aceito', false],
                ['recusado', false],
                ['profissional_id', Auth::id()],
            ])->count();
            $totalPedidosAceitos = Pedido::where([['aceito', true], ['profissional_id', Auth::id()]])->count();
            $totalPedidosRecusados = Pedido::where([['recusado', true], ['profissional_id', Auth::id()]])->count();
            return view(
                'dashboard.profissional.dashboard',
                [
                    'totalPedidosPendentes' => $totalPedidosPendentes,
                    'totalPedidosAceitos' => $totalPedidosAceitos,
                    'totalPedidosRecusados' => $totalPedidosRecusados,
                    'totalPedidos' => $totalPedidosPendentes + $totalPedidosAceitos + $totalPedidosRecusados
                ]
            );
        } else
            return view('dashboard.cliente.dashboard');
    }
}
