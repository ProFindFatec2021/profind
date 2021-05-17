<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="sidebar-mini">
    <div id="app">
        <nav class="main-header navbar navbar-expand navbar-dark fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars fa-lg"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('dashboard.index')}}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('index')}}" class="nav-link">Site</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-bold" href="{{route('logout')}}">
                        Logout
                        <i class="fas fa-sign-out-alt fa-lg ml-1"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
            <section class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                    <div class="image">
                        @if(Auth::user()->foto_perfil)
                        <img src="{{asset('storage/'.Auth::user()->foto_perfil)}}" class="img-circle elevation-2" alt="Foto {{Auth::user()->nome}}" style="height: calc(4.6rem /2);width: calc(4.6rem /2);object-fit: cover;" />
                        @else
                        <button class="text-dark bg-light px-1 py-2 rounded-circle d-flex align-items-center justify-content-center border-0" title="Adicionar foto de perfil" data-toggle="modal" data-target="#foto-perfil">
                            <i class="fas fa-user-plus fa-lg"></i>
                        </button>
                        @endif
                    </div>
                    <div class="info">
                        <a href="{{ route('dashboard.perfil.perfil') }}" class="d-block">{{Auth::user()->nome}}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="{{route('dashboard.index')}}" class="nav-link @if(Route::current()->getName() == "dashboard.index") active @endif">
                                <i class="fas fa-lg fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('dashboard.perfil.perfil') }}" class="nav-link @if(Request::segment(2) == "perfil") active @endif">
                                <i class="fas fa-lg fa-user-edit"></i>
                                <p>Editar perfil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.profissional.anuncio.index')}}" class="nav-link @if(Request::segment(2) == "anuncios") active @endif">
                                <i class="fas fa-lg fa-list-ol"></i>
                                <p>Anúncios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.pedido.index')}}" class="nav-link @if(Request::segment(2) == "pedidos") active @endif">
                                <i class="fas fa-lg fa-tasks"></i>
                                <p>Pedidos</p>
                                <span class="badge badge-success right">{{ App\Models\Pedido::where('visto', false)->count() > 0 ?? null }}</span>
                            </a>
                        </li>
                        @if(Auth::user()->tipo == 1)
                        <li class="nav-item">
                            <a href="{{route('dashboard.profissional.anuncio.index')}}" class="nav-link @if(Request::segment(2) == "anuncios") active @endif">
                                <i class="fas fa-lg fa-list-ol"></i>
                                <p>Anúncios</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('dashboard.chat.index') }}" class="nav-link @if(Request::segment(2) == "chat") active @endif">
                                <i class="fas fa-lg fa-comments"></i>
                                <p>Chat</p>
                                <span class="badge badge-success right">{{ App\Models\Chat::where([['visto', false], ['destinatario_id', Auth::id()]])->count() > 0 ?? null }}</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </section>
        </aside>

        <main class="p-4 pt-5 content-wrapper">
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
                        <div class="d-flex">
                            @yield('botao-acao')
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')

            <div class="modal" tabindex="-1" id="foto-perfil" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form class="modal-content" method="POST" action="{{route('dashboard.perfil.fotoPerfil')}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Adicione uma foto de perfil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="file" name="foto_perfil" aria-describedby="foto-perfil-helper">
                            <small id="foto-perfil-helper" class="form-text text-muted">
                                Adicionar foto de perfil traz mais confiança para seus clientes
                            </small>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js" integrity="sha512-AJUWwfMxFuQLv1iPZOTZX0N/jTCIrLxyZjTRKQostNU71MzZTEPHjajSK20Kj1TwJELpP7gl+ShXw5brpnKwEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    @yield('scripts')
</body>

</html>