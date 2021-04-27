@extends("layouts.backend")

@section('subtitulo', 'Anúncios de ' . $nome)


@section('content')
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

    @foreach ($anuncios as $anuncio)
    <tr>
      <th scope="row">{{$anuncio->id}}</th>
      <td>
        <a href="{{route('anuncio.show', ['id' => $anuncio])}}">
          {{$anuncio->nome}}
        </a>
      </td>
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
    @endforeach
  </tbody>
</table>
@endsection