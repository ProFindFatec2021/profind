@extends("layouts.backend")

@section('subtitulo', 'Login')

@section('content')
<form method="POST">
  @csrf
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" placeholder="Email" name="email" id="email">
  </div>

  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha">
  </div>

  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection