@extends('site.layouts.site')

@section('content')
<section class="form-page">
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

        <div class="input-group">
            <label class="label" for="nome">Nome</label>
            <input type="text" class="input" name="nome" id="nome" value="{{old('nome')}}">
        </div>


        <div class="input-group">
            <label class="label" for="telefone">Telefone</label>
            <input type="text" class="input" name="telefone" id="telefone" value="{{old('telefone')}}">
        </div>


        <div class="input-group">
            <label class="label" for="email">Email</label>
            <input type="email" class="input" name="email" id="email" value="{{old('email')}}">
        </div>


        <div class="input-group">
            <label class="label" for="senha">Senha</label>
            <input type="password" class="input" name="senha" id="senha" value="{{old('senha')}}">
        </div>

        <div class="input-group">
            <label for="foto_perfil">Foto de perfil</label>
            <input type="file" class="input" name="foto_perfil" id="foto_perfil">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <img src="images/teste_bg_login02.png" class="background-image">
</section>
@endsection