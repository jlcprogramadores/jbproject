@extends('layouts.app')

@section('title','Mostrar Iva')
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Iva</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Porcentaje:</strong>
                            {{ $iva->porcentaje }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $iva->descripcion }}
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ivas.index') }}"> Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif