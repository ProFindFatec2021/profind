@extends("layouts.backend")

@section('subtitulo', 'Ver anúncio')

@section('content')
<a href="{{route('usuario.perfil.anuncio.edit', ['id' => $anuncio->id])}}" class="btn btn-primary my-2 w-25 d-block mx-auto">Editar anúncio</a>
<form action="{{route('usuario.perfil.anuncio.destroy', ['id' => $anuncio->id])}}" method="post">
  @csrf
  @method('delete')
  <button onclick="return confirm('Deseja mesmo deletar este anúncio?')" type="submit" class="btn btn-danger my-2 w-25 d-block mx-auto">Deletar anúncio</button>
</form>

<table class="table table-light table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Descricao</th>
      <th scope="col">Categoria</th>
      <th scope="col">Foto do anúncio</th>
      <th scope="col">Criado em</th>
      <th scope="col">Atualizado em</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$anuncio->id}}</th>
      <td>{{$anuncio->nome}}</td>
      <td>{{$anuncio->descricao}}</td>
      <td>{{$anuncio->categoria->nome}}</td>
      <td>
        @if($anuncio->foto_anuncio)
        <img src="{{asset('storage/anuncio/'.$anuncio->foto_anuncio)}}" height="100" alt="Foto {{$anuncio->nome}}" />
        @else Sem foto @endif
      </td>
      <td>{{$anuncio->created_at}}</td>
      <td>{{$anuncio->updated_at}}</td>
    </tr>
  </tbody>
</table>
@endsection