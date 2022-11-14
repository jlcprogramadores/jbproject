@extends('layouts.app')

@section('title','Mostrar Teléfono')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Teléfono</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $telefono->cliente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedor Id:</strong>
                            {{ $telefono->proveedor_id }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $telefono->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $telefono->descripcion }}
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('telefonos.index') }}"> Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
