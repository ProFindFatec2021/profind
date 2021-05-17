@extends('dashboard.layouts.dashboard')

@section('titulo', 'Chat')

@section('content')
<div class="chat-wrap">
    @foreach($mensagens as $mensagem)
    @if($mensagem->remetente->id == Auth::id())
    <div class="direct-chat-msg right">
        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right">{{$mensagem->remetente->nome}}</span>
            <span class="direct-chat-timestamp float-left">{{$mensagem->created_at}}</span>
        </div>
        @if($mensagem->remetente->foto_perfil)
        <img class="direct-chat-img" src="{{asset('storage/' . $mensagem->remetente->foto_perfil)}}" alt="message user image">
        @else
        <i class="direct-chat-img fas fa-user fa-2x"></i>
        @endif
        <div class="direct-chat-text">
            {{$mensagem->mensagem}}
        </div>
    </div>
    @else
    <div class="direct-chat-msg">
        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-left">{{$mensagem->remetente->nome}}</span>
            <span class="direct-chat-timestamp float-right">{{$mensagem->created_at}}</span>
        </div>
        @if($mensagem->remetente->foto_perfil)
        <img class="direct-chat-img" src="{{asset('storage/' . $mensagem->remetente->foto_perfil)}}" alt="message user image">
        @else
        <i class="direct-chat-img fas fa-user fa-2x"></i>
        @endif
        <div class="direct-chat-text">
            {{$mensagem->mensagem}}
        </div>
    </div>
    @endif
    @endforeach

    <form method="post" action="{{Request::url()}}">
        @csrf
        <div class="input-group">
            <input type="text" id="mensagem" name="mensagem" placeholder="Digite sua mensagem" class="form-control">
            <span class="input-group-append">
                <button type="submit" class="btn btn-secondary">Enviar</button>
            </span>
        </div>
    </form>
</div>

<script>
    document.getElementById("mensagem").focus();
</script>
@endsection