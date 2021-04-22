@extends("layouts.backend")

@section('content')
<h1 class="text-white text-center">Profind</h1>
<h2 class="text-white text-center">Cadastro @yield('tipo-cadastro')</h2>

<form method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="tipo"
        value="{{Route::currentRouteName() === 'usuario.create.profissional' ? 1 : 0}}">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome">
    </div>

    <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" placeholder="Telefone" name="telefone" id="telefone">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email" id="email">
    </div>

    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha">
    </div>

    <div class="form-group">
        <label for="foto_perfil">Foto de perfil</label>
        <input type="file" class="form-control-file" name="foto_perfil" id="foto_perfil">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection