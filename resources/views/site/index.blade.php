@extends('site.layouts.site')

@section('content')

<section class="banner-slider">
    <img src="images/float00.jpg">
    <img src="images/float00.jpg">
    <img src="images/float00.jpg">
</section>

<section class="categorias">
    <h2 class="title">Categorias</h2>

    <ul class="list">
        @foreach($categorias as $categoria)
        <li>
            <a href="#" class="item">
                <i class="fa-3x {{$categoria->icone}}"></i>
                <h3 class="subtitle">{{$categoria->nome}}</h3>
            </a>
        </li>
        @endforeach
    </ul>
</section>

@endsection