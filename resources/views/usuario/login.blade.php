@extends("layouts.backend")

@section('content')
<h1 class="text-white text-center">Profind</h1>
<h2 class="text-white text-center">Login</h2>

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


@auth
<div class="mt-2">
  <a href="/logout" class="btn btn-warning">Sair</a>
  {{ auth()->user()->nome }}
</div>
@endauth
@endsection