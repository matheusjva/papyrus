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

<body class="index-page sidebar-collapse">
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
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">
                <i class="material-icons">person</i> Entrar
              </a>
            </li>
          @else 
            <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin') }}">
                        <i class="material-icons">dashboard</i> Gerenciar
                    </a>
            </li>
            <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="material-icons">face</i>
                        {{ Auth::user()->name }} 
                    </a>

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
            @endguest
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('/img/books4.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h2><span class="title">Bem vindo</span>, você está no repositório científico de Informática para Internet.</h2>
            <h5>Aqui você encontrará todo o material científico produzido pelo curso de Informática para Internet.</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="main main-raised">
        <div class="section section-basic">
            <div class="container">
                    <!-- Search form -->
                    <form>
                      <div class="form-group col-md-12 float-center">
                        <input type="text" class="form-control active-purple" id="exampleFormControlInput1" placeholder="Pesquise">
                      </div>
                    </form>
                  
    <div class="section section-examples">
      <div class="container-fluid text-center">
        <div class="row">        
            @foreach($works as $work)
                <div class="col-md-6">
                    @php
                        $tituloTruncado = substr($work['title'], 0, 50) . "...";
                    @endphp
                      <h3>{{$tituloTruncado}}</h3>
                    <div class="card card-nav-tabs">
                        <div class="card-body ">
                            <div class="tab-content text-center">
                                <div class="tab-pane active" id="profile">
                                  @php
                                   $resumoTruncado = substr($work['description'], 0, 200) . "...";
                                  @endphp  
                                    <p>{{$resumoTruncado}}</p>
                                </div>
                                <a class="btn btn-primary btn-lg" href="{{url('/show', $work['id'])}}">
                                  <i class="material-icons">remove_red_eye</i> Visualizar
                                </a>
                            </div>    
                        </div>
                    </div>
                </div>
            @endforeach 
      </div>
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