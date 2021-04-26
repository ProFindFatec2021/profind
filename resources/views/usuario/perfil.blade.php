@extends("layouts.backend")

@section('subtitulo', 'Perfil')

@section('content')
@if($usuario->tipo == 1)
<a href="{{route('usuario.perfil.anuncio.index')}}" class="btn btn-info my-2 w-25 d-block mx-auto">Ver anúncios</a>
@endif
<a href="{{route('usuario.perfil.edit')}}" class="btn btn-primary my-2 w-25 d-block mx-auto">Editar perfil</a>
<form action="{{route('usuario.perfil.destroy')}}" method="post">
  @csrf
  @method('delete')
  <button onclick="return confirm('Deseja mesmo deletar sua conta?')" type="submit"
    class="btn btn-danger my-2 w-25 d-block mx-auto">Deletar perfil</button>
</form>
<table class="table table-light table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Telefone</th>
      <th scope="col">Tipo de conta</th>
      <th scope="col">Foto de Perfil</th>
      <th scope="col">Criado em</th>
      <th scope="col">Atualizado em</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$usuario->id}}</th>
      <td>{{$usuario->nome}}</td>
      <td>{{$usuario->email}}</td>
      <td>{{$usuario->telefone}}</td>
      <td>{{$usuario->tipo == 1 ? 'Profissional' : 'Cliente'}}</td>
      <td>
        <img src="{{asset('storage/usuarios/perfil/'.$usuario->foto_perfil)}}" height="100"
          alt="Foto {{$usuario->nome}}" />
      </td>
      <td>{{$usuario->created_at}}</td>
      <td>{{$usuario->updated_at}}</td>
    </tr>
  </tbody>
</table>


@endsection