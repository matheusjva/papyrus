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
            </ul>
        </div>
    </div>
</nav>

<div class="page-header header-filter" data-parallax="true" style="height: 100vh; background-image: url('/img/books4.jpg');">
   

</div>
    <div class="main main-raised" style="margin-top: -550px;">
   
            <form method="post" class="card pt-4 " action="{{url('create')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-8">
                        <!-- <label for="Title">Título:</label> -->
                        <input required type="text" class="form-control" placeholder="TÍTULO" name="title">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-8">
                        <label for="Title">Área:</label>
                        <select required type="text" class="form-control" placeholder="Área" name="field">

                            @foreach($fields as $field)

                                <option value={{$field['id']}}>{{$field['name']}}</option>

                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-8">
                        <!-- <label for="Description">Descrição:</label> -->
                        <textarea required type="text-area" class="form-control" name="description" placeholder="RESUMO" rows="4"></textarea>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-md-2"></div>
                    <!-- <label for="Authors">Autores:</label> -->

                    <div align="center "class="form-group col-md-8" id="origem">
                        <input required type="text" class="form-control" placeholder="autores" name="authors[]" style="text-transform:uppercase">
                    </div>
                    <img  src="img/adicionar.png" style="cursor: pointer;" width="20" height="23" onclick="duplicarAuthor();">
                    <img  src="img/menos.png" style="cursor: pointer;" width="20" height="23" onclick="removerAuthor(this);"> 
                    
                    <div align="center" id="destino" class="form-group col-md-12">
                    </div>

                    
                </div>
    
   
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-8">
                        <label for="year"> Data:</label>
                        <input required type="date" required="required" maxlength="10" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="2012-01-01" max="2020-02-18" class="date form-control"  type="text" id="datepicker" name="year">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-8" id="origem2">
                        <!-- <label for="Jury">Banca:</label> -->
                        <input required type="text" class="form-control" placeholder="BANCA" name="jury[]" style="text-transform:uppercase">
                    </div>
                    <img  src="img/adicionar.png" style="cursor: pointer;" width="20" height="23" onclick="duplicarBanca();">
                    <img  src="img/menos.png" style="cursor: pointer;" width="20" height="23" onclick="removerBanca(this);"> 
                    
                    <div align="center" id="destino2" class="form-group col-md-12">
                    </div>
                </div>
                 <div class="text-center">
                    <span class="btn btn-raised btn-round btn-default btn-file ">
                        <span class="fileinput-new">Selecione o arquivo PDF</span>
                        <input required type="file" name="filename" />
                    </span>
                </div>
                
                <div class="row text-center">
                    <div class="form-group col-md-4" style="margin-top:30px">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>   
        </form>    
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
    <script>
        $(document).ready(function () {
            $('#datepicker').datepicker({
                format: "dd/mm/yyyy",
                language: "pt-BR"
            });
        });
    </script>
    <script type="text/javascript">
    
    function duplicarAuthor(){
        var clone = document.getElementById('origem').cloneNode(true);
        var destino = document.getElementById('destino');
        destino.appendChild (clone);
        
        var camposClonados = clone.getElementsByTagName('input');
        
        for(i=0; i<camposClonados.length;i++){
            camposClonados[i].value = '';
        }	
    }

function removerAuthor(id){
	var node1 = document.getElementById('destino');
	node1.removeChild(node1.childNodes[0]);
}
</script>

    <script type="text/javascript">
    
    function duplicarBanca(){
        var clone = document.getElementById('origem2').cloneNode(true);
        var destino = document.getElementById('destino2');
        destino.appendChild (clone);
        
        var camposClonados = clone.getElementsByTagName('input');
        
        for(i=0; i<camposClonados.length;i++){
            camposClonados[i].value = '';
        }	
    }

function removerBanca(id){
	var node1 = document.getElementById('destino2');
	node1.removeChild(node1.childNodes[0]);
}
    </script>
</body>

</html>