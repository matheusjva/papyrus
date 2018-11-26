<!doctype html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RepWork</title>

    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">RepWork</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sobre</a>
            </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Buscar</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Acessar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-5">
          <small>Cadastro de TCC's </small>
      </h1>

      <!-- Project One -->
        <form method="post" action="{{url('work')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-8">
                    <label for="Title">Título:</label>
                    <input type="text" class="form-control" name="title">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-8">
                    <label for="Description">Descrição:</label>
                    <textarea type="text-area" class="form-control" name="description" rows="4"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-8">
                    <label for="Authors">Autores:</label>
                    <input type="text" class="form-control" name="authors">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-8">
                    <label for="year"> Ano:</label>
                    <input class="date form-control"  type="text" id="datepicker" name="date">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-8">
                    <label for="Jury">Banca:</label>
                    <input type="text" class="form-control" name="jury">
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
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

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
  </body>

</html>
