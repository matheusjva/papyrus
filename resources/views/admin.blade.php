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
        <a class="navbar-brand" href="#"><img src="img/logo3.png" width="120px" height="80px"/></a>
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
                    <a class="nav-link" href="#">Inicio
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
<div class="container mb-5" style="padding-top: 130px;">

        <div class="container card">
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
                    <th colspan="3">Ações</th>
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
                        <td><a href="{{ url('update/form', $work['id'])}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ url('delete', $work['id'])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                        <td><a href="{{url('download', $work['filename'])}}" class="btn btn-info">Download</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</div>
<!-- Footer -->
<footer class="logo-sfdc">
    <div class="container">
        <p class="m-0 text-center text-dark">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
