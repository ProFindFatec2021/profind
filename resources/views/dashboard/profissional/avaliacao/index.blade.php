@extends('dashboard.layouts.dashboard')


@section('titulo', 'Avaliações de seus anúncios')

@section('content')

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Anúncio</th>
      <th>Avaliação</th>
      <th>Descrição</th>
      <th>Cliente</th>
    </tr>
  </thead>
  <tbody>
    @foreach($avaliacoes as $avaliacao)
    <tr>
      <td><a href="{{ route('dashboard.profissional.anuncio.edit', $avaliacao->anuncio->id) }}">{{$avaliacao->anuncio->nome}}</a></td>
      <td>{{$avaliacao->avaliacao}}</td>
      <td>{{$avaliacao->descricao}}</td>
      <td>{{$avaliacao->cliente->nome}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection