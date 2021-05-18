@extends('site.layouts.site')

@section('content')
<section class="loginScreen">
  <form class="form" method="POST">
    @csrf
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" placeholder="Insert your user email" required><br>
    <label for="senha">Password:</label><br>
    <input type="password" name="senha" id="senha" placeholder="Insert your user password" required><br>
    <center>
      <input type="submit" value="Entrar" name="btn" class="btn">
    </center>
  </form>
  <img src="images/teste_bg_login02.png" class="bg-log">
</section>

@endsection