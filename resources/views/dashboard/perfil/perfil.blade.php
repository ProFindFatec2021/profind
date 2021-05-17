@extends('dashboard.layouts.dashboard')

@section('titulo', 'Editar perfil')

@section('botao-acao')
<form method="post">
  @csrf
  @method('delete')
  <button onclick="return confirm('Deseja mesmo deletar sua conta?')" type="submit" class="btn btn-danger">Deletar perfil</button>
</form>
@endsection

@section('content')

<form method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="form-group">
    <label for="foto_perfil" class="m-0">Foto de perfil
      @if($usuario->foto_perfil)
      <div class="image">
        <img src="{{asset('storage/'.$usuario->foto_perfil)}}" id="foto" class="d-block" height="100" alt="Foto {{$usuario->nome}}" />
        <div class="hover">
          <i class="fas fa-pen mr-2"></i>Editar foto
        </div>
      </div>
      <input type="file" class="d-none" onchange="onFileSelected(event)" name="foto_perfil" id="foto_perfil">
      @else
      <input type="file" class="form-control-file" onchange="onFileSelected(event)" name="foto_perfil" id="foto_perfil">
      @endif
    </label>
  </div>

  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" name="nome" id="nome" value="{{$usuario->nome}}">
  </div>

  <div class="form-group">
    <label for="descricao">E-mail</label>
    <input type="email" class="form-control" name="email" id="email" value="{{$usuario->email}}">
  </div>

  <div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" class="form-control" name="telefone" id="telefone" value="{{$usuario->telefone}}">
  </div>

  <div class="form-group custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" name="tipo" id="tipo" {{$usuario->tipo == 1 ? 'checked' : ''}}>
    <label class="custom-control-label" for="tipo">Conta profissional</label>
  </div>


  <button type="submit" class="btn btn-primary">Editar perfil</button>
</form>
@endsection