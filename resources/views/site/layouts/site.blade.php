<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/site.css')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- <link rel="stylesheet" href="../public/css/index.css"> -->

    <title>ProFind</title>
</head>
<header class="header">
    <nav class="nav">
        <h1>
            <a href="{{route('index')}}">
                <img src="{{asset('images/logo.svg')}}" class="logo-header" alt="ProFInd">
            </a>
        </h1>
        <ul class="list">
            @guest
            <li><a href="{{route('usuario.create.cliente')}}" class="item">find</a></li>
            <li><a href="{{route('usuario.create.profissional')}}" class="item">pro</a></li>
            <li><a href="{{route('login')}}" class="item bar">login</a></li>
            @endguest
            @auth
            <li><a href="{{route('dashboard.index')}}" class="item">Olá, {{Auth::user()->nome}}</a></li>
            <li><a href="{{route('logout')}}" class="item bar">Sair</a></li>
            @endauth
        </ul>
    </nav>
</header>

<body>
    <main>
        <!-- @yield('content') -->
        <div class="section hero">
            <div class="hero_left">
                <div class="title_main">
                    Conectamos quem sabe <br>com quem precisa.
                </div>
                <div class="subtitle">
                    Se voce procura alguem procure conosco.
                </div>
                <input class="input_search" type="text" name="search" placeholder="Digite o que procura">
                <input class="submit_search" type="submit" value="Buscar">
            </div>
            <div class="hero_right">
                <img src="assets/images/martelo-de-unha.png" alt="martelo-de-unha" id="image-hero">
            </div>
        </div>

        <div class="section services">
            <div class="title">Principais Serviços</div>
            <div class="card-emphasis">
            <div class="card">
                <div class="image-card">
                    <img src="assets/images/Marceneiro-Trabalhando.jpg" id="image-card" alt="Marceneiro-Trabalhando">
                </div>
                <div class="card-text">
                    Marcenaria
                </div>
                <div class="card-text card-budget">
                    Solicite um Orçamento   
                </div>
            </div>
            <div class="card">
                <div class="image-card">
                    <img src="assets/images/Marceneiro-Trabalhando.jpg" id="image-card" alt="Marceneiro-Trabalhando">
                </div>
                <div class="card-text">
                    Marcenaria
                </div>
                <div class="card-text card-budget">
                    Solicite um Orçamento   
                </div>
            </div>
            <div class="card">
                <div class="image-card">
                    <img src="assets/images/Marceneiro-Trabalhando.jpg" id="image-card" alt="Marceneiro-Trabalhando">
                </div>
                <div class="card-text">
                    Marcenaria
                </div>
                <div class="card-text card-budget">
                    Solicite um Orçamento   
                </div>
            </div>
            </div>
        </div>

        <div class="section feedback">
            <div class="title">Alguns feedbacks para convencer voce</div>
            <div class="feedbacks">
                <div class="feedback-card">
                    <i class="uil uil-comment-alt-share"></i>
                    <span>Fui muito bem atendida, 
                        o profissional foi muito educado 
                        e fez um trabalho de qualidade. 
                        Valeu a pena, orçamento grátis 
                        e não é careiro. <br><br>
        
                        <strong>Serviço de Pedreiro</strong>,
                        Ana Paula Contratou um 
                        Pedreiro em São Paulo, SP</span>
                </div>
                <div class="feedback-card">
                    <i class="uil uil-comment-alt-share"></i>
                    <span>Fui muito bem atendida, 
                        o profissional foi muito educado 
                        e fez um trabalho de qualidade. 
                        Valeu a pena, orçamento grátis 
                        e não é careiro. <br><br>
        
                        <strong>Serviço de Pedreiro</strong>,
                        Ana Paula Contratou um 
                        Pedreiro em São Paulo, SP</span>
                </div>
                <div class="feedback-card">
                    <i class="uil uil-comment-alt-share"></i>
                    <span>Fui muito bem atendida, 
                        o profissional foi muito educado 
                        e fez um trabalho de qualidade. 
                        Valeu a pena, orçamento grátis 
                        e não é careiro. <br><br>
        
                        <strong>Serviço de Pedreiro</strong>,
                        Ana Paula Contratou um 
                        Pedreiro em São Paulo, SP</span>
                </div>
            </div>
        </div>
    </main>


    <!-- <footer>
        <div class="foot">
            <div class="fleft">
                <p>
                <h1>Who are us?</h1>
                Lorem Ipsum is simply dummy text of the
                printing and typesetting industry.
                Lorem Ipsum has been the industry's standard
                dummy text ever since the 1500s, when an
                unknown printer took a galley of type and
                scrambled it to make a type specimen book
                </p>
            </div>
            <div class="fright">
                <p>
                <h1>Work with us</h1>
                - Get up to 20 monthly contracts<br>
                - Become a requested pro<br>
                - Receive our seals of approval
                </p>
                <div class="medias">
                    <ul>
                        <li>
                            <a href="#">
                                <span class="icon"><i class="fab fa-facebook" aria-hidden="true"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="icon"><i class="fab fa-instagram" aria-hidden="true"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="icon"><i class="fab fa-youtube" aria-hidden="true"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="icon"><i class="fab fa-twitter" aria-hidden="true"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/site-min.js')}}"></script>
</body>

</html>