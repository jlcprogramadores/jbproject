@extends('layouts.app')

@section('title','Mostrar Cliente')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Atrás</a>
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
                            <strong>Es Activo:</strong>
                            {{ $cliente->es_activo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
