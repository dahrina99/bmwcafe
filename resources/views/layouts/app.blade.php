<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layouts.css">
</head>

<title>
    @yield('title')
</title>

<body>
    <nav class="navbar navbar-expand-lg">
        <div id="mySidebar" class="sidebar">
            <div style="padding-top: 20%">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <div class="logo"> BMW Cafe </div>

                @can('manage-users')
                <a href="{{ route('admin.index') }}"> Dashboard </a>
                <a href="#"> Products Management </a>
                <a href="{{ route('admin.users.index') }}"> Users Management </a>
                <a href="#"> Website Management </a>
                <a href="#"> Transaction Recap</a>
                @endcan

                <br>
                <hr />
                <br>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <div id="main">
            <button class="openbtn" onclick="openNav()">☰</button>
        </div>
        <span class="navbar-text ml-auto" style="margin-right: 2%;">
            Hello, {{ Auth::user()->name }}
        </span>
    </nav>
    <div class="content">
        <div class="container" style="padding-top: 20px;">
            @include('partials.alerts')
            @yield('content')
        </div>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0px";
        }
    </script>
</body>

</html>