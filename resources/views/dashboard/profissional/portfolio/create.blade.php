@extends('dashboard.layouts.dashboard')



@section('titulo', 'Criar portfolio')

@section('content')

<form method="POST" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label for="anuncio">Anuncio</label>
    <select name="anuncio_id" id="anuncio" class="custom-select">
      <option value="" selected>Selecione um anuncio</option>
      @foreach ($anuncios as $anuncio)
      <option {{Request::get('anuncio') == $anuncio->id ? 'selected' : ''}} value="{{$anuncio->id}}">{{$anuncio->nome}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" placeholder="Descrição" name="descricao" id="descricao" value="{{old('descricao')}}">
  </div>

  <div class="form-group">
    <label for="foto_portfolio">Foto do projeto</label>
    <input type="file" class="form-control-file" name="foto_portfolio" id="foto_portfolio">
  </div>

  <button type="submit" class="btn btn-primary">Criar Portfolio</button>
</form>
@endsection