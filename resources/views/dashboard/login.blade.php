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



  <form method="POST">
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
</body>

</html>