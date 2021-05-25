@extends('site.layouts.site')

@section('content')
<section class="loginScreen">
  <form class="form" method="POST" class="form">
    <h2 class="title">Entrar</h2>
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" placeholder="Insira seu email" required>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" placeholder="Insira sua senha" required>
    <button type="submit" class="button">Entrar</button>
  </form>
  <img src="images/teste_bg_login02.png" class="background-image">
</section>

@endsection