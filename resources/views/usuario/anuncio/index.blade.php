@extends("layouts.backend")

@section('content')
<h1 class="text-white text-center">Profind</h1>
<h2 class="text-white text-center">Anúncios</h2>
<a href="{{route('usuario.anuncio.create')}}" class="btn btn-success my-2 w-25 d-block mx-auto">Criar anúncio</a>

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
        <a href="{{route('usuario.anuncio.show', ['id' => $anuncio])}}">
          {{$anuncio->nome}}
        </a>
      </td>
      <td>{{$anuncio->descricao}}</td>
      <td>{{$anuncio->categoria->nome}}</td>
      <td>
        <img src="{{asset('storage/usuarios/anuncio/'.$anuncio->foto_anuncio)}}" height="100"
          alt="Foto {{$anuncio->nome}}" />
      </td>
      <td>{{$anuncio->created_at}}</td>
      <td>{{$anuncio->updated_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection