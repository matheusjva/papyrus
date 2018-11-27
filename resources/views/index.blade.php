<!DOCTYPE html>
<html>
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
        <div class="container">
            <br />
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Autor(es)</th>
                    <th>Banca</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($works as $work)
                    @php
                        $date=date('Y-m-d', $work['date']);
                    @endphp
                    <tr>
                        <td>{{$work['title']}}</td>
                        <td>{{$work['description']}}</td>
                        <td>{{$date}}</td>
                        <td>{{$work['authors']}}</td>
                        <td>{{$work['jury']}}</td>

                        <td><a href="{{action('WorkController@edit', $work['id'])}}" class="btn btn-warning">Editar</a></td>
                        <td>
                            <form action="{{action('WorkController@destroy', $work['id'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Deletar</button>
                            </form>
                        </td>
                        <td><a href="{{action('WorkController@download', $work['filename'])}}" target="_blank" class="btn btn-info"> Download</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</div>
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

</body>
</html>
