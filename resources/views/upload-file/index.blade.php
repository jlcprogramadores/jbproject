@extends('layouts.app')

@section('title','Compartir Archivo')

@section('content')
<section class="content container-fluid">

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <title>{{ config('app.name') }}</title>
</head>

<style>
    .card-footer, .progress {
        display: none;
    }
</style>

<body>

<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Subir Archivo a Compartir</h5>
                </div>
                <div class="form-group d-none">
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="card-body">
                    <div id="upload-container" class="text-center">
                        <button id="btnSubirArchivo"  class="btn btn-success">Subir Archivo</button>
                    </div>
                    <div class="progress mt-3" style="height: 25px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                    </div>
                    <br>
                    <div id="avisoExito" style="display: none" class="alert alert-success text-center" role="alert">
                        ¡Archivo cargado exitosamente!
                    </div>
                </div>
                
                <div class="card-footer p-4" >  
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@push('scripts')
<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Resumable JS -->
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

<script type="text/javascript">

    // function obtenArchivoNombre(val) {
    //     document.getElementById("btnSubirArchivo").style.display = "inline-block";
    // }

    let btnSubirArchivo = $('#btnSubirArchivo');
    
    let resumable = new Resumable({
        target: '{{ route('files.upload.large') }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(btnSubirArchivo[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        document.getElementById("avisoExito").style.display = "block";
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        alert('Error al subir el archivo.')
    });


    let progress = $('.progress');
    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }
</script>
</body>
</html>
@endpush
