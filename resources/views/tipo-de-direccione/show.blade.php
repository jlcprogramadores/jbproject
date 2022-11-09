@extends('layouts.app')

@section('title','Mostrar Tipo De Dirección')
@if(\Auth::check())
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Tipo De Dirección</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipo-de-direcciones.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tipoDeDireccione->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Es Fiscal:</strong>
                            {{ $tipoDeDireccione->es_fiscal }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif