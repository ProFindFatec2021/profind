@extends('dashboard.layouts.dashboard')


@section('titulo', 'Seus portfolios')

@section('botao-acao')
<a href="{{route('dashboard.profissional.portfolio.create')}}" type="button" class="btn btn-success btn-lg">Criar portfolio</a>
@endsection

@section('content')
<div class="row">
  @if(count($portfolios) < 1) <p>Não possui ainda nenhum portfolio, <a href="{{route('dashboard.profissional.portfolio.create')}}">clique aqui</a> para criar um.</p>
    @else
    @foreach ($portfolios as $portfolio)
    <div class="col-12 col-sm-6 col-md-4">
      <div class="bg-light card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-7">
              <p class="text-muted text-sm"><b>Anuncio:</b> <a href="{{route('dashboard.profissional.anuncio.edit', $portfolio->anuncio->id)}}">{{$portfolio->anuncio->nome}}</a></p>
              <p class="text-muted text-sm"><b>Descriçao:</b> {{$portfolio->descricao}}</p>
              <p class="text-muted text-sm"><b>Criado em:</b> {{$portfolio->created_at}}</p>
            </div>
            <div class="col-md-5">
              @if($portfolio->foto_portfolio)
              <img src="{{asset('storage/' . $portfolio->foto_portfolio)}}" class="d-block" alt="Foto {{$portfolio->nome}}" style="width: 100%; height: auto; object-fit: cover;" />
              @endif
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <form method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{$portfolio->id}}">
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