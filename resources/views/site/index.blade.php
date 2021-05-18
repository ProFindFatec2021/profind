@extends('site.layouts.site')

@section('content')

<section class="banner-slider">
    <img src="images/float00.jpg">
    <img src="images/float00.jpg">
    <img src="images/float00.jpg">
</section>

<section class="categorias">
    <h2 class="title">Categorias mais requisitadas</h2>

    @foreach($categorias as $categoria)
    <h3>{{$categoria->nome}}</h3>
    </div>
    @endforeach
</section>

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

@endsection