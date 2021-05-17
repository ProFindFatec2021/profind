<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::where('remetente_id', Auth::id())->groupBy('destinatario_id')->get();

        return view('dashboard.chat.index', ['chats' => $chats]);
    }

    public function show($id)
    {
        Chat::where([['destinatario_id', Auth::id()], ['remetente_id', $id]])->update([
            'visto' => true
        ]);

        $mensagensEnviadas = Chat::where([['remetente_id', Auth::id()], ['destinatario_id', $id]])->get();
        $mensagensRecebidas = Chat::orWhere([['remetente_id', $id], ['destinatario_id', Auth::id()]])->get();
        $mensagens = $mensagensRecebidas->merge($mensagensEnviadas)->sortby('created_at');

        return view('dashboard.chat.show', ['mensagens' => $mensagens]);
    }

    public function store(Request $request, $id)
    {
        Chat::create([
            'destinatario_id' => $id,
            'remetente_id' => Auth::id(),
            'mensagem' => $request->mensagem,
            'visto' => false,
        ]);

        return back();
    }
}
