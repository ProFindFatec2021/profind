@extends('site.layouts.site')

@section('content')
<section class="loginScreen">
    <form method="POST" action="{{route('usuario.store')}}" class="form" enctype="multipart/form-data">
        @if ($errors->any())
        <ul class="erros" role="alert">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <h2 class="title">Criar conta {{Route::currentRouteName() == 'usuario.create.profissional' ? 'Profissional' : 'Cliente'}}</h2>
        @csrf
        <input type="hidden" name="tipo" value="{{Route::currentRouteName() == 'usuario.create.profissional' ? 1 : 0}}">
        <label for="nome">Nome</label>
        <input type="text" placeholder="Nome" name="nome" id="nome" value="{{old('nome')}}">

        <label for="telefone">Telefone</label>
        <input type="text" placeholder="Telefone" name="telefone" id="telefone" value="{{old('telefone')}}">

        <label for="email">Email</label>
        <input type="email" placeholder="Email" name="email" id="email" value="{{old('email')}}">

        <label for="senha">Senha</label>
        <input type="password" placeholder="Senha" name="senha" id="senha" value="{{old('senha')}}">

        <label for="foto_perfil">Foto de perfil</label>
        <input type="file" class="form-control-file" name="foto_perfil" id="foto_perfil">

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <img src="images/teste_bg_login02.png" class="background-image">
</section>
@endsection