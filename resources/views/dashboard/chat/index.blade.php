@extends('dashboard.layouts.dashboard')

@section('titulo', 'Chat')

@section('content')

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>{{Auth::user()->tipo == 1 ? 'Cliente' : 'Profissional'}}</th>
            <th>Mensagem</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($chats as $chat)
        <tr class="clickable-row" data-href='{{route('dashboard.chat.show', $chat->destinatario->id)}}' style="cursor: pointer;">
            <td>
                @if($chat->destinatario->foto_perfil)
                <img class="direct-chat-img" src="{{asset('storage/' . $chat->destinatario->foto_perfil)}}" alt="message user image">
                @else
                <i class="direct-chat-img fas fa-user fa-2x"></i>
                @endif
            </td>
            <td>{{$chat->destinatario->nome}}</td>
            <td>
                {{$chat->mensagem}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
@endsection