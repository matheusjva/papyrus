@extends('layouts.layout')

@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Project One -->
    <form method="post" class="card2 pt-4 " action="{{url('update', $work->id)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-8">
                <label for="Title">Título:</label>
                <input type="text" class="form-control" name="title" value="{{$work->title}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-8">
                <label for="Description">Descrição:</label>
                <textarea type="text-area" class="form-control" name="description" rows="4" value="{{$work->description}}">{{$work->description}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-8">
                <label for="Authors">Autores:</label>
                <input type="text" class="form-control" name="authors" value="{{$work->authors}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-8">
                <label for="year"> Data:</label>
                <input type="date" required="required" maxlength="10" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="2012-01-01" max="2020-02-18" class="date form-control"  type="text" id="datepicker" name="year" value="{{$work->year}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-8">
                <label for="Jury">Banca:</label>
                <input type="text" class="form-control" name="jury" value="{{$work->jury}}">
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
                <button type="submit" class="btn btn-success">Alterar</button>
            </div>
        </div>
    </form>
</div>
<!-- /.container -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>
    $(document).ready(function () {
        $('#datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR"
        });
    });
</script>
@endsection
