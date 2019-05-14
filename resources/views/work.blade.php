<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Papyrus
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="/css/material-kit.css?v=2.0.5" rel="stylesheet" />
</head>

<body class="profile-page sidebar-collapse">
<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="#">
                Papyrus</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item">
                    <a href="{{url('/')}}" class="nav-link">
                        <i class="material-icons">home</i> Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('form') }}">
                        <i class="material-icons">add</i> Cadastrar
                    </a>
                </li>
                <li class="nav-item dropdown">
                    {{--  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="material-icons">face</i>
                        {{ Auth::user()->name }} 
                    </a>  --}}

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="material-icons"> exit_to_app</i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="page-header header-filter" data-parallax="true" style="height: 100vh; background-image: url('/img/books4.jpg');">
   

</div>
<div class="main main-raised" style="margin-top: -550px;">
   
        <div class="card text-center" style="padding: 30px;">
            <div class="card-body">

            <h4><b>Título:</b></h4> <h5>{{$works['title']}}</h5>
            <h4><b>Resumo:</b></h4> <p>{{$works['description']}}</p>
            <h4><b>Autores:</b></h4>
                @foreach($authors as $author)                               
                          <p>{{$author->name}}</p>              
                @endforeach
            <h4><b>Data de publicação:</b></h4> <p>{{$works['year']}}</p>
            <h4><b>Banca:</b></h4> 
                @foreach($juries as $jury)                               
                          <p>{{$jury->name}}</p>              
                @endforeach
            <a class="btn btn-primary ml-0" href="{{url('download', $works['filename'])}}">Download</a>
        </div>
    </div>
        </div>
    </div>

        <footer class="footer" data-background-color="black">
            <div class="container">
                <div class="copyright float-center">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Todos os direitos reservados.
                </div>
            </div>
        </footer>
            </div>
        </div>
    </div>
</div>


    <!--   Core JS Files   -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="/js/popper.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap-material-design.min.js" type="text/javascript"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            //init DateTimePickers
            materialKit.initFormExtendedDatetimepickers();

            // Sliders Init
            materialKit.initSliders();
        });


        function scrollToDownload() {
            if ($('.section-download').length != 0) {
                $("html, body").animate({
                    scrollTop: $('.section-download').offset().top
                }, 1000);
            }
        }

    </script>
</body>

</html>







{{--  ############################################################  --}}
    
