<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/responsive.css">

    <title> BMW Cafe </title>
</head>

<body>

    <header>
        @foreach ($websites as $website)
        <div class="top-nav container">
            <div class="logo"> 
                <a href="/">
                    <img src="/img/logo.png" alt="" style="height: 50px;">
                </a>
            </div>
            @if (Route::has('login')) 
            <ul>
                <li> <a href="/"> Home </a> </li>
                <li> <a href="shop"> Menu </a> </li>
                <li> <a href="#about"> About Us </a> </li>
                @auth
                <li>
                    <div class="dropdown">
                        <button class="dropbtn"> {{Str::limit (Auth::user()->name, 5) }} </button>
                        <div class="dropdown-content">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
                <li> <a href="cart"> My Cart </a> </li>
                @else
                <li> <a href="{{ route('login') }}"> Sign In </a> </li>
                <li> <a href="{{ route('register') }}"> Register </a> </li>
                @endif
                @endauth
            </ul>
        </div>


        <div class="hero container">
            <div class="hero-copy">
                <h1> BMW Cafe </h1>
                <h3> Enjoy your happy day with our coffee! </h3>
                <p> {{ $website->description }} </p>
                <div class="hero-buttons">
                    <a href="shop" class="button button-black"> Order Now </a>
                </div>
            </div>

            <div class="hero-image">
                <img src="/img/bmw-cup.png" alt="hero image">
            </div>
        </div>
    </header>

    <div class="about-section" id="about">
        <h1 class="text-center"> About Us </h1>
        <div class="about-bagian">
            <div class="about-image">
                <img src="img/foto-bmw.png" alt="">
            </div>
            <div class="about-paragraf">
                <p class="container">
                    {{ $website->about }}
                </p>
            </div>
        </div>
        
    </div>
    @endforeach

    <div class="featured-section">
        <div class="container">
            <h1 class="text-center"> Our Special Menu </h1>
            <div class="products text-center">
                @foreach ($menus as $menu)
                <div class="card">
                    <div>
                        <a href="{{ route('menu.show', $menu->slug) }}"> <img src="{{ asset($menu->image) }}" alt="menu" style="width: 10rem; height:10rem; padding-bottom:10px"> </a>
                    </div>
                    <div>
                        <a href="{{ route('menu.show', $menu->slug) }}">
                            <span class="product-name"> {{ $menu->name }} </span> 
                        </a>
                    </div>
                   
                    <div class="product-price"> Rp. {{ $menu->price }} </div>
                </div>
                
                @endforeach
            </div>
        </div>
    </div>

    @foreach ($websites as $website)
    <footer>
        <div class="footer-content container">
            <div class="made-with">
             
            </div>
            <ul>
                <li> <i class="fa fa-envelope" aria-hidden="true"></i> {{ $website->email }} </li>
                <li> <i class="fa fa-phone" aria-hidden="true"></i> {{ $website->phone }} </li>
                <li> <i class="fa fa-instagram" aria-hidden="true"></i> {{ $website->instagram }} </li>
            </ul>
        </div>
    </footer>
    @endforeach
</body>

</html>