@extends('layouts.app')

@section('title','Mostrar Cliente')
@if(\Auth::check())
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Cliente</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Razon Social:</strong>
                            {{ $cliente->razon_social }}
                        </div>
                        <div class="form-group">
                            <strong>Mail:</strong>
                            {{ $cliente->mail }}
                        </div>
                        <div class="form-group">
                            <strong>Rfc:</strong>
                            {{ $cliente->rfc }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            @if($cliente->es_activo  == 1 )
                                <p class="text-success">Activo</p>
                            @else
                                <p class="text-danger">Inactivo</p>

                            @endif
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif