@extends("layouts.backend")

@section('subtitulo', 'Editar anúncio')

@section('content')

<form method="POST" enctype="multipart/form-data">
  @method('put')
  @csrf

  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome" value={{$anuncio->nome}}>
  </div>

  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" placeholder="Descrição" name="descricao" id="descricao"
      value={{$anuncio->descricao}}>
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

  {{-- <div class="form-group">
    <label for="foto_anuncio">Foto do anuncio</label>
    <img src="{{asset('storage/usuarios/anuncio/'.$anuncio->foto_anuncio)}}" class="d-block" height="100"
      alt="Foto {{$anuncio->nome}}" />
    <input type="file" class="form-control-file" name="foto_anuncio" id="foto_anuncio">
  </div> --}}

  <button type="submit" class="btn btn-primary">Editar anúncio</button>
</form>


@endsection