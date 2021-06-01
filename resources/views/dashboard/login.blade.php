@extends('site.layouts.site')

@section('content')
<section class="form-page">
  <form class="form" method="POST" class="form">
    @if (Session::has('success'))
    <span class="success">{{ Session::get('success')}}</span>
    @endif
    @if (Session::has('error'))
    <span class="error">{{ Session::get('error')}}</span>
    @endif
    <h2 class="title">Entrar</h2>
    @csrf
    <div class="input-group">
      <label class="label" for="email">Email:</label>
      <input class="input" type="email" name="email" id="email">
    </div>
    <div class="input-group">
      <label class="label" for="senha">Senha:</label>
      <input class="input" type="password" name="senha" id="senha">
    </div>
    <button type="submit" class="button">Entrar</button>
  </form>
  <img src="images/teste_bg_login02.png" class="background-image">
</section>

@endsection