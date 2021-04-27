@extends("layouts.backend")

@section('subtitulo', 'Profissionais')

@section('content')
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
    @foreach ($usuarios as $usuario)
    <tr>
      <th scope="row">{{$usuario->id}}</th>
      <td>
        <a href="{{route('usuario.show', ['id' => $usuario->id])}}">
          {{$usuario->nome}}
        </a>
      </td>
      <td>{{$usuario->email}}</td>
      <td>{{$usuario->telefone}}</td>
      <td>{{$usuario->tipo == 1 ? 'Profissional' : 'Cliente'}}</td>
      <td>
        @if($usuario->foto_perfil)
        <img src="{{asset('storage/'.$usuario->foto_perfil)}}" height="100" alt="Foto {{$usuario->nome}}" />
        @else Sem foto @endif
      </td>
      <td>{{$usuario->created_at}}</td>
      <td>{{$usuario->updated_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection