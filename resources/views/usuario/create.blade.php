<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <title>testLayoutProfind</title>
</head>
<header>
    <div class="menu">
        <ul>
            <li><a href="{{route('index')}}" class="logo">PROFIND</a></li>
            <li><a href="{{route('login')}}" class="signin">login</a></li>
            <li><a href="{{route('usuario.create.cliente')}}" class="signup">find</a></li>
            <li><a href="{{route('usuario.create.profissional')}}" class="signup">pro</a></li>
        </ul>
    </div>
</header>

<body>


    <section class="loginScreen">
        <form method="POST" action="{{route('usuario.create.store')}}" class="form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tipo" value="{{Route::currentRouteName() == 'usuario.create.profissional' ? 1 : 0}}">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" placeholder="Nome" name="nome" id="nome">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" placeholder="Telefone" name="telefone" id="telefone">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" placeholder="Senha" name="senha" id="senha">
            </div>

            <div class="form-group">
                <label for="foto_perfil">Foto de perfil</label>
                <input type="file" class="form-control-file" name="foto_perfil" id="foto_perfil">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <img src="images/teste_bg_login02.png" class="bg-log">
    </section>
</body>

</html>