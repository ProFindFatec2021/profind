<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Pedido;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidosRecusados = Pedido::where('profissional_id', Auth::id())->where('recusado', true)->get();
        $pedidosAceitos = Pedido::where('profissional_id', Auth::id())->where('aceito', true)->get();
        $pedidos = Pedido::where('profissional_id', Auth::id())->where('recusado', false)->where('aceito', false)->orderBy('created_at')->get();
        Pedido::where('visto', false)->update([
            'visto' => true
        ]);
        return view('dashboard.profissional.pedido.index', [
            'pedidos' => $pedidos,
            'pedidosRecusados' => $pedidosRecusados,
            'pedidosAceitos' => $pedidosAceitos
        ]);
    }

    public function store(Request $request, $id)
    {
        if (Auth::user()->tipo != 0) abort(403);

        $anuncio = Anuncio::where('id', $id)->firstOrFail();
        Pedido::create([
            'profissional_id' => $anuncio->usuario->id,
            'cliente_id' => Auth::id(),
            'status' => 'Primeira proposta',
        ]);
        return redirect()->back();
    }

    public function aceitar($id)
    {
        Pedido::where('id', $id)->update([
            'aceito' => true
        ]);

        return redirect()->route('dashboard.profissional.pedido.index')->with('success', 'Pedido aceito com sucesso');
    }
    public function recusar($id)
    {
        Pedido::where('id', $id)->update([
            'recusado' => true
        ]);

        return redirect()->route('dashboard.profissional.pedido.index')->with('error', 'Pedido recusado com sucesso');
    }
    public function update(Request $request)
    {
        Pedido::where('id', $request->id)->update([
            'status' => $request->status,
            'preco' => $request->preco
        ]);

        return redirect()->route('dashboard.profissional.pedido.index')->with('success', 'Status alterado com sucesso');
    }
}
