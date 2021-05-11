<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
    crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/cards.css">
    <script type="text/javascript" src="js/slider.js"></script>
    <title>testLayoutProfind</title>
</head>
<header>
    <div class="menu">
        <ul>
            <li><a href="#" class="logo">PROFIND</a></li>
            <li><a href="{{route('login')}}" class="signin">login</a></li>
            <li><a href="{{route('usuario.create.cliente')}}" class="signup">find</a></li>
            <li><a href="{{route('usuario.create.profissional')}}" class="signup">pro</a></li>
        </ul>
    </div>
</header>
<body>
    <div class="slideshow-container">
        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="images/float00.jpg" style="width:100%">
          <div class="text">Caption One</div>
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="images/float00.jpg" style="width:100%">
          <div class="text">Caption Two</div>
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="images/float00.jpg" style="width:100%">
          <div class="text">Caption Three</div>
        </div>
        
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        
        </div>
        <br>
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
        <nav>
            <div class="container">
                <P>same of text</P>
            </div>
            <div class="title">
                <P><h1>Categorias mais requisitadas</h1></P>
            </div>
            <div class="card">
                <img src="images/flag-of-the-soviet-union.jpg" alt="card" style="width:100%; height: 260px;">
                <div class="container">
                  <h4><b>Categoria</b></h4>
                  <p>Area</p>
                </div>
              </div>

            <footer>
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
            </footer>
        </nav>
</body>
</html>