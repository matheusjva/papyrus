<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="imagem/x-icon" href="../../img/icon.png"/>

    <title>Papyrus</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
</head>
<body style="background-color: #c8cbcf  ">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top" >
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img src="img/logo3.png" width="120px" height="80px"/></a>
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
                    <a class="nav-link" href="{{url('form')}}">Cadastrar</a>
                </li>

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
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
    <div class="container mb-5" style="padding-top: 120px;">

      <!-- Project One -->
        <form method="post" class="card pt-4 " action="{{url('create')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-8">
                    <!-- <label for="Title">Título:</label> -->
                    <input type="text" class="form-control" placeholder="TÍTULO" name="title">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-8">
                    <label for="Title">Área:</label>
                    <select type="text" class="form-control" placeholder="Área" name="field">

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
                    <textarea type="text-area" class="form-control" name="description" placeholder="RESUMO" rows="4"></textarea>
                </div>
            </div>
            <div class="row">
            <div class="col-md-2"></div>
                <!-- <label for="Authors">Autores:</label> -->

                <div align="center "class="form-group col-md-8" id="origem">
                    <input type="text" class="form-control" placeholder="autores" name="authors[]" style="text-transform:uppercase">
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
                    <input type="date" required="required" maxlength="10" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="2012-01-01" max="2020-02-18" class="date form-control"  type="text" id="datepicker" name="year">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-8" id="origem2">
                    <!-- <label for="Jury">Banca:</label> -->
                    <input type="text" class="form-control" placeholder="BANCA" name="jury[]" style="text-transform:uppercase">
                </div>
                <img  src="img/adicionar.png" style="cursor: pointer;" width="20" height="23" onclick="duplicarBanca();">
                <img  src="img/menos.png" style="cursor: pointer;" width="20" height="23" onclick="removerBanca(this);"> 
                
                <div align="center" id="destino2" class="form-group col-md-12">
	            </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-8">
                    <input type="file" name="filename">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-4" style="margin-top:30px">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.container -->

<!-- Footer -->
<footer class="logo-sfdc">
    <div class="container">
        <p class="m-0 text-center text-dark">&copy; Papyrus 2018</p>
    </div>
    <!-- /.container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#datepicker').datepicker({
                format: "dd/mm/yyyy",
                language: "pt-BR"
            });
        });
    </script>

<!-- <script type="text/javascript">
function AssignValues()
{
    //var elemento = document.getElementById("teste");
    var i = 1;
    for (i; i < 20; i++) {
        if((sessionStorage.getItem("text" + i)) == null){
            sessionStorage.setItem(("text"+i), document.form1.text.value);
            break;
        }
    } 
}
//localStorage.setItem("text1", document.form1.text1.value);
function Value1()
{
alert("Value 1 is " + sessionStorage.getItem("text1"));
}

</script>
 <h1 id="demo"></h1>
 <script type="text/javascript">
        // var texto = sessionStorage.getItem("text1";);
        // document.body.querySelector("#minhadiv").innerHTML = texto;
        // print("teste");
    document.getElementById("demo").innerHTML = sessionStorage.getItem("text1");

</script> -->
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

<!-- <div id="origem" align="center">
        <input type="text" name="text[]" placeholder="Enter text...">
</div>
        <input  type="button" value="Mais" style="cursor: pointer;" onclick="duplicarCampos();">
		<input  type="button" value="menos" style="cursor: pointer;" onclick="removerCampos(this);"> 
	
	<div id="destino">
	</div> -->

<!-- <form name="form1">

<input type="text" name="text" placeholder="Enter text...">
<br>
<br>
<input id="teste" type="button" value="Assign values" onClick="AssignValues()">
<br>
<input type="button" value="Show value 1" onClick="Value1()">
</form> -->
  </body>

</html>
