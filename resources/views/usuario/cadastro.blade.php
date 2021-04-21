@extends("layouts.backend")

@section("tipo-cadastro", "Profissional")

@section('form')
<form method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" placeholder="Nome" name="nome" id="nome">
    <input type="text" placeholder="Telefone" name="telefone" id="telefone">
    <input type="text" placeholder="Email" name="email" id="email">
    <input type="password" placeholder="Senha" name="senha" id="senha">
    <input type="file" name="foto_perfil" id="foto_perfil">
    <button type="submit">Enviar</button>
</form>
@endsection