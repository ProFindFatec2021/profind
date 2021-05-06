@extends('layouts.dashboard')

@section('titulo', 'Seus anúncios')

@section('botao-acao')
<a href="{{route('dashboard.anuncio.create')}}" type="button" class="btn btn-success btn-lg mb-2">Criar anúncuio</a>
@endsection

@section('content')
<div class="row">
  @if(count($anuncios) < 1) <p>Não possui ainda nenhum anúncio, <a href="{{route('dashboard.anuncio.create')}}">clique aqui</a> para criar um.</p>
    @else
    @foreach ($anuncios as $anuncio)
    <div class="col-12 col-sm-6 col-md-4">
      <div class="bg-light card">
        <a href="https://pracaprosperitah.com.br/sistema/leads/272" class="card-body">
          <h2>{{$anuncio->nome}}</h2>
          <p class="text-muted text-sm"><b>Criado em:</b> {{$anuncio->created_at}}</p>
          <p class="text-muted text-sm"><b>Categoria:</b> {{$anuncio->categoria->nome}}</p>
          <p class="text-muted text-sm"><b>Descrilçao:</b> {{$anuncio->descricao}}</p>
        </a>
        <div class="card-footer row justify-content-end">
          <a href="{{route('dashboard.anuncio.edit', $anuncio->id)}}" class="btn btn-sm btn-primary">
            <i class="fas fa-edit fa-lg"></i>
          </a>
          <form method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{$anuncio->id}}">
            <button onclick="return confirm('Deseja mesmo deletar este anúncio?')" type="submit" class="btn btn-sm btn-danger ml-2">
              <i class="fas fa-lg fa-trash-alt"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
</div>
@endif
@endsection