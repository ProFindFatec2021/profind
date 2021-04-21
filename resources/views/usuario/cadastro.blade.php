<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>

<body style="background-color: #333" class="antialiased">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST">
        @csrf
        <input type="text" name="nome" id="nome">
        <input type="text" name="telefone" id="telefone">
        <input type="text" name="email" id="email">
        <input type="text" name="tipo" id="tipo">
        <input type="password" name="senha" id="senha">
        <input type="text" name="foto_perfil" id="foto_perfil">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>