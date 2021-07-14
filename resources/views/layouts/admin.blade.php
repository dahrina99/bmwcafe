<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> BMW Cafe - Admin </title>

    <!-- Bootstrap -->
    <link href="{{asset('template/')}}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('template/')}}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('template/')}}/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('template/')}}/build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin.css">
</head>

<body class="nav-md" >
    <div class="container body" >
        <div class="main_container" style="background-color: black" >
            <div class="col-md-3 left_col" >
                <div class="left_col scroll-view" style="background-color: black" >
                    <div class="navbar nav_title"  style="background-color: black">
                        <a href="/admin/index" class="site_title"><img src="/img/logo.png" alt="" style="height: 50px;"><span class="label1"> Admin </span></a>
                    </div>
 
                    <div class="clearfix" ></div>

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" >
                        <div class="menu_section" >
                            <ul class="nav side-menu">
                                <li><a href="/admin/home"><i class="fa fa-home" aria-hidden="true"></i> Home </a>
                                </li>
                            </ul>
                            @can('superadmin')
                            <ul class="nav side-menu">
                                <li><a href="/admin/website"><i class="fa fa-desktop" aria-hidden="true"></i> Edit Website Page </a>
                                </li>
                            </ul>
                            @endcan
                            <ul class="nav side-menu">
                                <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-user" aria-hidden="true"></i> User Management </a>
                                </li>
                            </ul>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-cutlery"></i> Menu <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/admin/menu"> Daftar Menu </a></li>
                                        <li><a href="/admin/featured"> Daftar Menu Unggulan </a></li>
                                        <li><a href="{{ route('admin.menu.create') }}"> Add Menu </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-folder"></i> Category <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('admin.category.index') }}"> Kategori Menu </a></li>
                                        <li><a href="{{ route('admin.category.create') }}"> Add Category </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav side-menu">
                                <li><a href="{{ route('admin.order.index') }}"><i class="fa fa-list-ul" aria-hidden="true"></i> Daftar Pesanan </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav" >
                <div class="nav_menu" >
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav" >
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>@yield('content-title')</h3>
                        </div>

                        <div class="title_right">
                            @yield('search')
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_content">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('template/')}}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('template/')}}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="{{asset('template/')}}/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{asset('template/')}}/vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('template/')}}/build/js/custom.min.js"></script>
</body>

</html>