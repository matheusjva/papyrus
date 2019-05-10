<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="imagem/x-icon" href="../../img/icon.png"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Papyrus</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="/css/material-kit.css?v=2.0.5" rel="stylesheet" />

    <style type="text/css">
        .card {
            border-radius: 12px;
            box-shadow: 0 6px 10px -4px rgba(0, 0, 0, 0.15);
            background-color: #FFFFFF;
            color: #252422;
            margin-bottom: 20px;
            position: relative;
            border: 0 none;
            -webkit-transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
            -moz-transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
            -o-transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
            -ms-transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
            transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
        }
        .logo-sfdc {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            width: 100%;
            max-width: 430px;
            height: 80px;
            background-color: #c8cbcf;
            background-image: radial-gradient(at 50% top, rgba(5, 19, 41, 0.6) 0, rgba(12, 42, 77, 0) 75%), radial-gradient(at right top, #c8cbcf 0, rgba(121, 74, 162, 0) 57%);
            background-size: 100% 1px;
            background-repeat: no-repeat;

        a {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #9e93ab;
            color: rgba(255, 255, 255, 0.4);
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: .05em;
            font-size: 0.7142rem;

        span.logo {
            display: inline-block;
            align-self: baseline;
            height: 28px;
            width: 28px;
            text-align: center;
            margin: 0 3px -22px;
            overflow: hidden;
            background: url(“../../public/assets/images/logo/logo-lais.png”) no-repeat;
            background-size: cover;

        &:before {
             content: “”;
             display: block;
             width: 0;
             height: 100%;
         }
        }

        .short-name {
            position: relative;
            font-size: 1.4285rem;
            margin-right: 10px;
            font-weight: 200;

        &::after {
             content: ‘’;
             position: absolute;
             right: -11px;
             top: 0;
             bottom: 0;
             width: 1px;
             opacity: .3;
             background-image: linear-gradient(to top, rgba(5, 19, 41, 1) 0, #d4d4d4 30%, #d4d4d4 70%, rgba(5, 19, 41, 1) 100%)
         }
        }

        .company {
            display: inline-flex;
            flex-direction: column;
            align-items: flex-start;
            margin-left: 10px;
            line-height: 10px;

        .long-name {
            font-size: 8px;
            font-weight: bold;
        }

        .ufrn {
            font-size: 7px;
        }
        }
        }
        }
    </style>
    <!-- Scripts
    <script src="{{ asset('../js/app.js') }}" defer></script>
-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('../css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #c8cbcf  ">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top" >
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img src="../../img/logo3.png" width="120px" height="80px"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                    </form>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Inicio
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre</a>
                </li>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                        </li>
                        
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mb-5" style="padding-top: 100px;">
        
            @yield('content')
        
    </div>

    <footer class="logo-sfdc">
        <div class="container">
            <p class="m-0 text-center text-dark">&copy; Papyrus 2018</p>
        </div>
    <!-- /.container -->
    </footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="/js/popper.min.js" type="text/javascript"></script>
  <script src="/js/bootstrap-material-design.min.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="/js/material-kit.js?v=2.0.5" type="text/javascript"></script>

</div>
</body>
</html>
