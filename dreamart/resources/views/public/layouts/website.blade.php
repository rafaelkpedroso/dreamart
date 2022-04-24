<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dream Art</title>

    <!-- Favicon -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,400;0,700;1,300;1,400;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="{{ asset('css/website.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <style>

        .profile a, .profile a:hover, .profile a:active{
            color:#fb792c;
            font-weight: bold;
        }
    </style>

</head>
<body class="{{ $class ?? '' }}">

<div class="wrapper wrapper-full-page">
    <div class="full-page {{ $contentClass ?? '' }}">

        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <a href="/">
                            <div id="logo">
                                <h1>Dream Art</h1>
                                <p>We fight for a Cause</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 m-auto">
                        <div id="searchcontainer">
                            <form name="searchform" action="/busca/" method="get">
                                <input type="text" name="search" id="search" placeholder="O que você está buscando?">
                                <img src="/img/search-icon.png"  style="position: absolute;  left: 18px; top: 14px;"/>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 m-auto">
                        <div class="profile">

                            @if(Auth::user())
                                <div id="profileinfo">
                                    <span class="profilepic"></span>
                                    {{ Auth::user()->name  }}
                                </div>
                            @else
                                <a href="/login"  class="forcez">Entre</a> ou <a href="planos"  class="forcez">crie sua conta</a>
                            @endif

                            
                            <img src="/img/hamburguer-icon.png" id="hamburguer" style="margin-left: 20px"  class="forcez"/>
                        
                        </div>
                    </div>

                </div>

            </div>
        </header>

        <div class="content">

                @yield('content')
        </div>

        <nav>
            <ul>
                <li>
                    <a href="/">
                        <img src="/img/icon-home.png" alt="Home" />
                        Home
                    </a>
                </li>
                <li>
                    <a href="/videos">
                        <img src="/img/icon-videos.png" alt="Vídeos" />
                        Vídeos
                    </a>
                </li>
                <li>
                    <a href="/lives">
                        <img src="/img/icon-lives.png" alt="Lives" />
                        Lives
                    </a>
                </li>
                <li>
                    <a href="/podcasts">
                        <img src="/img/icon-podcast.png" alt="Podcasts" />
                        Podcasts
                    </a>
                </li>
                <!--li>
                    <a href="/favoritos">
                        <img src="/img/icon-favoritos.png" alt="Favoritos" />
                        Favoritos
                    </a>
                </li-->

                @if(Auth::user())
                    @if(Auth::user()->type == 'admin')
                        <li>
                            <a href="/admin">
                                Administração
                            </a>
                        </li>
                    @endif
                @endif

                <li>
                    <a href="/logout">
                        Sair
                    </a>
                </li>

</ul>
</nav>

@include('public.layouts.footer')
</div>
</div>

<!-- javascript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@stack('js')

<script>
/*menu*/
$(document).ready(function(){

$("#hamburguer").click(function(){

if ($("nav").hasClass('active')){
$("nav").removeClass('active');
$("nav").animate({"margin-left": '-=200'});
} else {
$("nav").addClass('active');
$("nav").animate({"margin-left": '+=200'});
}


});
});
</script>
</body>
</html>
