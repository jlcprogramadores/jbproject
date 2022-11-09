@extends('layouts.app')

@section('title','Mostrar Proveedor')
@if(\Auth::check())
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Proveedor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proveedores.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proveedore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Razon Social:</strong>
                            {{ $proveedore->razon_social }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $proveedore->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Dias De Credito:</strong>
                            {{ $proveedore->dias_de_credito }}
                        </div>
                        <div class="form-group">
                            <strong>Monto De Credito:</strong>
                            {{ $proveedore->monto_de_credito }}
                        </div>
                        <div class="form-group">
                            <strong>Es Facturable:</strong>
                            {{ $proveedore->es_facturable }}
                        </div>
                        <div class="form-group">
                            <strong>Mail:</strong>
                            {{ $proveedore->mail }}
                        </div>
                        <div class="form-group">
                            <strong>Rfc:</strong>
                            {{ $proveedore->rfc }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            @if($proveedore->es_activo  == 1 )
                                <p class="text-success">Activo</p>
                            @else
                                <p class="text-danger">Inactivo</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif