@extends('dashboard.layouts.dashboard')

@section('content')
<h2>Pedidos Pendentes</h2>
@if(count($pedidos) < 1) <p>Nenhum pedido pendente.</p>
  @else
  <div class="row">
    @foreach ($pedidos as $pedido)
    <div class="col-12 col-sm-6 col-md-4">
      <div class="bg-light card">
        <div class="card-body">
          @if(Auth::user()->tipo == 1)
          <p><b>Cliente:</b> {{$pedido->cliente->nome}}</p>
          @else
          <p><b>Profissional:</b> {{$pedido->profissional->nome}}</p>
          @endif
          <p><b>Anúncio:</b> {{$pedido->anuncio->nome}}</p>
          <p><b>Status:</b> {{$pedido->status}}</p>
          <p><b>Preço do pedido:</b> R${{$pedido->preco}}</p>
          <p><b>Preço no anúncio:</b> R${{$pedido->anuncio->preco}}</p>
          <p><b>Atualizado em:</b> {{$pedido->updated_at}}</p>
          <p><b>Criado em:</b> {{$pedido->created_at}}</p>
        </div>

        <div class="card-footer d-flex justify-content-end">
          <button type="button" class="btn btn-sm btn-primary d-flex align-items-center mr-2" data-toggle="modal" data-target="#modal-{{$pedido->id}}">
            <i class="fas fa-edit fa-lg mr-1"></i>
            <b>Editar Status</b>
          </button>
          <a href="{{route('dashboard.pedido.recusar', ['id' => $pedido->id])}}" class="btn btn-sm btn-danger d-flex align-items-center mr-2">
            <i class="fas fa-times-circle fa-lg mr-1"></i>
            <b>Recusar</b>
          </a>
          <a href="{{route('dashboard.pedido.aceitar', ['id' => $pedido->id])}}" class="btn btn-sm btn-success d-flex align-items-center">
            <i class="fas fa-check-circle fa-lg mr-1"></i>
            <b>Aceitar</b>
          </a>
        </div>

        @if(!$pedido->visto)
        <div class="ribbon-wrapper ribbon-lg">
          <div class="ribbon bg-info text-lg">
            Novo
          </div>
        </div>
        @endif
      </div>
    </div>

    <div class="modal" tabindex="-1" id="modal-{{$pedido->id}}" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title">Editar status do pedido</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id" value="{{$pedido->id}}">
            <div class="form-group">
              <label for="status">Status do pedido</label>
              <input type="text" class="form-control" name="status" id="status" value="{{$pedido->status}}">
            </div>
            <div class="form-group">
              <label for="preco">Preço do pedido</label>
              <input type="text" class="form-control" name="preco" id="preco" value="{{$pedido->preco}}">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
    @endforeach
  </div>
  @endif

  <hr>
  <h2>Pedidos Aceitos</h2>
  @if(count($pedidosAceitos) < 1) <p>Nenhum pedido aceito.</p>
    @else

    <div class="row">
      @foreach ($pedidosAceitos as $pedido)
      <div class="col-12 col-sm-6 col-md-4">
        <div class="bg-light card">
          <div class="card-body">
            @if(Auth::user()->tipo == 1)
            <p><b>Cliente:</b> {{$pedido->cliente->nome}}</p>
            @else
            <p><b>Profissional:</b> {{$pedido->profissional->nome}}</p>
            @endif
            <p><b>Anúncio:</b> {{$pedido->anuncio->nome}}</p>
            <p><b>Status:</b> {{$pedido->status}}</p>
            <p><b>Preço do pedido:</b> R${{$pedido->preco}}</p>
            <p><b>Preço no anúncio:</b> R${{$pedido->anuncio->preco}}</p>
            <p><b>Atualizado em:</b> {{$pedido->updated_at}}</p>
            <p><b>Criado em:</b> {{$pedido->created_at}}</p>
          </div>
        </div>

        <div class=" ribbon-wrapper ribbon-lg">
          <div class="ribbon bg-success text-lg">
            Aceito
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endif

    <hr>
    <h2>Pedidos Recusados</h2>
    @if(count($pedidosAceitos) < 1) <p>Nenhum pedido aceito.</p>
      @else

      <div class="row">
        @foreach ($pedidosRecusados as $pedido)
        <div class="col-12 col-sm-6 col-md-4">
          <div class="bg-light card">
            <div class="card-body">
              @if(Auth::user()->tipo == 1)
              <p><b>Cliente:</b> {{$pedido->cliente->nome}}</p>
              @else
              <p><b>Profissional:</b> {{$pedido->profissional->nome}}</p>
              @endif
              <p><b>Anúncio:</b> {{$pedido->anuncio->nome}}</p>
              <p><b>Status:</b> {{$pedido->status}}</p>
              <p><b>Preço do pedido:</b> R${{$pedido->preco}}</p>
              <p><b>Preço no anúncio:</b> R${{$pedido->anuncio->preco}}</p>
              <p><b>Atualizado em:</b> {{$pedido->updated_at}}</p>
              <p><b>Criado em:</b> {{$pedido->created_at}}</p>
            </div>

            <div class="ribbon-wrapper ribbon-lg">
              <div class="ribbon bg-danger text-lg">
                Recusado
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      </div>
      @endif
      @endsection