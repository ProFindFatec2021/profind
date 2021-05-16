@extends('dashboard.layouts.dashboard-profissional')

@section('titulo', 'Editar anúncio')

@section('content')
<form method="POST" enctype="multipart/form-data">
  @method('put')
  @csrf

  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome" value="{{$anuncio->nome}}">
  </div>

  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" placeholder="Descrição" name="descricao" id="descricao" value="{{$anuncio->descricao}}">
  </div>

  <div class="form-group">
    <label for="preco">Preço</label>
    <input type="number" step=".01" class="form-control" placeholder="Preço" name="preco" id="preco" value="{{$anuncio->preco}}">
  </div>

  <div class="form-group">
    <label for="categoria">Categoria</label>
    <select name="categoria" id="categoria" class="custom-select">
      @foreach ($categorias as $categoria)
      <option {{$anuncio->categoria->id === $categoria->id ? 'selected' : ''}} value="{{$categoria->id}}">
        {{$categoria->nome}}
      </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="foto_anuncio" class="m-0">Foto do anúncio
      @if($anuncio->foto_anuncio)
      <div class="image">
        <img src="{{asset('storage/'.$anuncio->foto_anuncio)}}" id="foto" class="d-block" height="100" alt="Foto {{$anuncio->nome}}" />
        <div class="hover">
          <i class="fas fa-pen mr-2"></i>Editar foto
        </div>
      </div>
      <input type="file" class="d-none" onchange="onFileSelected(event)" name="foto_anuncio" id="foto_anuncio">
      @else
      <input type="file" class="form-control-file" onchange="onFileSelected(event)" name="foto_anuncio" id="foto_anuncio">
      @endif
    </label>
  </div>

  <button type="submit" class="btn btn-primary">Editar anúncio</button>
</form>


@endsection