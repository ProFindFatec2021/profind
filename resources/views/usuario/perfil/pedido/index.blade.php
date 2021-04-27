@extends("layouts.backend")

@section('subtitulo', 'Pedidos')


@section('content')
<table class="table table-light table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Cliente</th>
      <th scope="col">Profissional</th>
      <th scope="col">Status</th>
      <th scope="col">Aceito</th>
      <th scope="col">Criado em</th>
      <th scope="col">Atualizado em</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($pedidos as $pedido)
    <tr>
      <th scope="row">{{$pedido->id}}</th>
      <td>{{$pedido->cliente->nome}}</td>
      <td>{{$pedido->profissional->nome}}</td>
      <td>{{$pedido->status}}</td>
      <td>{{$pedido->aceito}}</td>
      <td>{{$pedido->created_at}}</td>
      <td>{{$pedido->updated_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection