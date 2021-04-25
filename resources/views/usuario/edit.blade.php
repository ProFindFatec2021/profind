@extends("layouts.backend")

@section('subtitulo', 'Editar perfil')
@section('content')
<form method="POST" enctype="multipart/form-data">
  @method('PUT')
  @csrf

  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome" value="{{$usuario->nome}}">
  </div>

  <div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" class="form-control" placeholder="Telefone" name="telefone" id="telefone"
      value="{{$usuario->telefone}}">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="{{$usuario->email}}">
  </div>

  <div class="form-group custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" name="tipo" id="tipo" {{$usuario->tipo == 1 ? 'checked' : ''}}>
    <label class="custom-control-label" for="tipo">Conta profissional</label>
  </div>

  {{-- <div class="form-group">
    <label for="foto_perfil">Foto de perfil</label>
    <img src="{{asset('storage/usuarios/perfil/'.$usuario->foto_perfil)}}" class="d-block" height="100"
  alt="Foto {{$usuario->nome}}" />
  <input type="file" class="form-control-file" name="foto_perfil" id="foto_perfil" value="{{$usuario->foto_perfil}}">
  </div> --}}

  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>


@endsection