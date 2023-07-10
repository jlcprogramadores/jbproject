@extends('adminlte::page')

@section('template_title')
    {{ $archivo->name ?? 'Show Archivo' }}
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Archivo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('archivos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $archivo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $archivo->url }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Edito:</strong>
                            {{ $archivo->usuario_edito }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif
