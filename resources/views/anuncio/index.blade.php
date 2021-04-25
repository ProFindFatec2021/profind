@extends("layouts.backend")

@section('subtitulo', 'Anúncios')


@section('content')

<table class="table table-light table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Descricao</th>
      <th scope="col">Usuário</th>
      <th scope="col">Categoria</th>
      <th scope="col">Foto do anúncio</th>
      <th scope="col">Criado em</th>
      <th scope="col">Atualizado em</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($anuncios as $anuncio)
    <tr>
      <th scope="row">{{$anuncio->id}}</th>
      <td>
        <a href="{{route('anuncio.show', ['id' => $anuncio->id])}}">
          {{$anuncio->nome}}
        </a>
      </td>
      <td>{{$anuncio->descricao}}</td>
      <td>
        <a href="{{route('usuario.show', ['id' => $anuncio->usuario->id])}}">
        {{$anuncio->usuario->nome}}
        </a>
      </td>
      <td>{{$anuncio->categoria->nome}}</td>
      <td>
        <img src="{{asset('storage/anuncio/'.$anuncio->foto_anuncio)}}" height="100" alt="Foto {{$anuncio->nome}}" />
      </td>
      <td>{{$anuncio->created_at}}</td>
      <td>{{$anuncio->updated_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection