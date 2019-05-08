@extends('layouts.layout')

@section('content')
    <div class="row card2 pt-3 pr-2 pl-2 pb-2">
        <div class="col-md-12">
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
@endsection