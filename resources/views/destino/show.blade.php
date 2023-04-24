@extends('layouts.app')

@section('title','Mostrar Destino')
@if(Auth::check() && Auth::user()->es_activo)


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Destino</span>
                        </div>
                        <div class="float-right">
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $destino->nombre }}
                        </div>
                        <br>
                    <a class="btn btn-primary" href="{{ route('destinos.index') }}"> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif
