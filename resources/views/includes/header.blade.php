<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('index')}}">ProFind</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('anuncio.index')}}">Anúncios</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('usuario.index')}}">Profissionais</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('usuario.create.cliente')}}">Cadastro de cliente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('usuario.create.profissional')}}">Cadastro de profissional</a>
        </li>
        @endguest
      </ul>

      <div class="ml-auto d-flex">
        @auth
        <a href="{{route('dashboard.index')}}" class="nav-link">Olá, {{ auth()->user()->nome }}</a>
        <a href="{{route('logout')}}" class="btn btn-warning">Sair</a>
        @endauth
        @guest
        <a href="{{route('login')}}" class="nav-link">Fazer Login</a>
        @endguest
      </div>
    </div>
  </nav>
</header>