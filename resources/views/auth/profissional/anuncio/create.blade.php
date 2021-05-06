@extends('layouts.dashboard')


@section('titulo', 'Criar anúncio')

@section('content')

<form method="POST" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome" value="{{old('nome')}}">
  </div>

  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" placeholder="Descrição" name="descricao" id="descricao" value="{{old('descricao')}}">
  </div>

  <div class="form-group">
    <label for="categoria">Categoria</label>
    <select name="categoria" id="categoria" class="custom-select">
      <option value="" selected>Selecione uma categoria</option>
      @foreach ($categorias as $categoria)
      <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="foto_anuncio">Foto do anuncio</label>
    <input type="file" class="form-control-file" name="foto_anuncio" id="foto_anuncio">
  </div>

  <button type="submit" class="btn btn-primary">Criar anúncio</button>
</form>
@endsection