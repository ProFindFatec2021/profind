@extends(Auth::user()->tipo == 1 ? "dashboard.layouts.dashboard-profissional" : "dashboard.layouts.dashboard-cliente")

@section('titulo', 'Chat')

@section('content')

@foreach ($chats as $chat)
<a href="{{route('dashboard.chat.show', $chat->destinatario->id)}}">{{$chat->destinatario->nome}} - {{$chat->remetente->nome}}</a>
<br>
@endforeach
@endsection