@extends('dashboard.layouts.dashboard')



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
    <label for="preco">Preço</label>
    <input type="number" step=".01" class="form-control" placeholder="Preço" name="preco" id="preco" value="{{old('preco')}}">
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
    <label for="images">Imagens do anuncio</label>
    <input type="file" name="fotos[]" name="fotos" class="form-control-file" id="images" multiple="multiple">
  </div>

  <div class="d-flex flex-wrap preview">
  </div>

  <button type="submit" class="btn btn-primary">Criar anúncio</button>
</form>
@endsection