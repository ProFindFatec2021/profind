@extends('dashboard.layouts.dashboard')


@section('titulo', 'Seus anúncios')

@section('botao-acao')
<a href="{{route('dashboard.profissional.anuncio.create')}}" type="button" class="btn btn-success btn-lg">Criar anúncuio</a>
@endsection

@section('content')
<div class="row">
  @if(count($anuncios) < 1) <p>Não possui ainda nenhum anúncio, <a href="{{route('dashboard.profissional.anuncio.create')}}">clique aqui</a> para criar um.</p>
    @else
    @foreach ($anuncios as $anuncio)
    <div class="col-12 col-sm-6 col-md-4">
      <div class="bg-light card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-7">
              <h2>{{$anuncio->nome}}</h2>
              <p class="text-muted text-sm"><b>Criado em:</b> {{$anuncio->created_at}}</p>
              <p class="text-muted text-sm"><b>Categoria:</b> {{$anuncio->categoria->nome}}</p>
              <p class="text-muted text-sm"><b>Preço:</b> R${{$anuncio->preco}}</p>
              <p class="text-muted text-sm"><b>Descriçao:</b> {{$anuncio->descricao}}</p>
              <p class="text-muted text-sm"><b>Nota média:</b> {{$anuncio->avaliacoes->avg('avaliacao') ?? '-'}}</p>
            </div>
            <div class="col-md-5">
              @if($anuncio->foto_anuncio)
              <img src="{{asset('storage/' . $anuncio->foto_anuncio)}}" class="d-block" alt="Foto {{$anuncio->nome}}" style="width: 100%; height: auto; object-fit: cover;" />
              @endif
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <a href="{{route('dashboard.profissional.portfolio.create', ['anuncio' => $anuncio->id])}}" class="btn btn-sm btn-success">
            <i class="fas fa-plus fa-lg"></i>
          </a>
          <a href="{{route('dashboard.profissional.anuncio.edit', $anuncio->id)}}" class="btn btn-sm btn-primary ml-2">
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