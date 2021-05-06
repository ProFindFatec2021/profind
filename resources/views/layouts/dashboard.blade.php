<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="sidebar-mini">
    <div id="app">
        <aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
            <section class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                    <div class="image">
                        <img src="{{asset('storage/'.Auth::user()->foto_perfil)}}" class="img-circle elevation-2" alt="Foto {{Auth::user()->nome}}" style="height: 3rem;width: 3rem;object-fit: cover;" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{Auth::user()->nome}}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a data-widget="pushmenu" href="#" class="nav-link" role="button">
                                <i class="fas fa-lg fa-bars"></i>
                                <p>Abrir/fechar barra</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.index')}}" class="nav-link @if(Route::current()->getName() == "dashboard.index") active @endif">
                                <i class="fas fa-lg fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.anuncio.index')}}" class="nav-link @if(Request::segment(2) == "anuncios") active @endif">
                                <i class="fas fa-lg fa-list-ol"></i>
                                <p>Anúncios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @if(Request::segment(2) == "pedidos") active @endif">
                                <i class="fas fa-lg fa-tasks"></i>
                                <p>Pedidos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @if(Request::segment(2) == "chat") active @endif">
                                <i class="fas fa-lg fa-comments"></i>
                                <p>Chat</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </section>
        </aside>

        <main class="p-4 content-wrapper">
            @if ($errors->any())
            <ul class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            @if (Session::has('error'))
            <ul class="alert alert-danger" role="alert">
                <li>{{ Session::get('error')}}</li>
            </ul>
            @endif

            @if (Session::has('success'))
            <ul class="alert alert-success" role="alert">
                <li>{{ Session::get('success')}}</li>
            </ul>
            @endif

            <div class="content-header">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <h1>@yield('titulo')</h1>
                        @yield('botao-acao')
                    </div>
                </div>
            </div>

            @yield('content')
        </main>
    </div>
</body>

</html>