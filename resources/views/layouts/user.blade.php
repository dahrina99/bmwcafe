<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/user.css">
    <link rel="stylesheet" href="/css/responsive.css">

    <title>
        @yield('title')
    </title>
</head>

<body>
    <header>
        <div class="top-nav container">
            @foreach ($websites as $website)
            <div class="logo">
                <a href="/">
                    <img src="/img/logo.png" alt="" style="height: 50px;">
                </a>
            </div>
            @endforeach
            @if (Route::has('login'))
            <ul>
                <li> <a href="/"> Home </a> </li>
                <li> <a href="/shop"> Menu </a> </li>
                <li> <a href="/#about"> About Us </a> </li>
                @auth
                <li> 
                    <div class="dropdown">
                        <button class="dropbtn"> {{Str::limit (Auth::user()->name, 5) }} </button>
                        <div class="dropdown-content">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Keluar') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('cart.index') }}"> My Cart
                        <span class="cart-count">
                            @if (Cart::instance('default')->count() > 0)
                            <span>
                                {{ Cart::instance('default')->count() }}
                            </span>
                            @endif
                        </span>
                    </a>
                </li>
                @else
                <li> <a href="{{ route('login') }}"> Sign In </a> </li>
                <li> <a href="{{ route('register') }}"> Register </a> </li>
                @endif
                @endauth
            </ul>
        </div>
    </header>
    @yield('breadcrumb-content')

    <div class="content-section">
        <div class="menu-category container">
            @yield('category-content')
        </div>
        <div class="menu-category container">
            @yield('order-steps')
        </div>
        <div class="title-nav container">
            @yield('line-break')
            <div class="title-section container row">
                @yield('title-section')
            </div>
            @yield('line-break')
        </div>
        <div class="menu-section">
            @yield('content')
        </div>
        <div class="pagination-section">
            @yield('pagination')
        </div>
    </div>
    @yield('extra-js')
</body>

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

</html>