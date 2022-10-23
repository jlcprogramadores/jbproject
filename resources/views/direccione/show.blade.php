@extends('layouts.app')

@section('title','Mostrar Dirección')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Dirección</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('direcciones.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo De Direccione Id:</strong>
                            {{ $direccione->tipo_de_direccione_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $direccione->cliente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedor Id:</strong>
                            {{ $direccione->proveedor_id }}
                        </div>
                        <div class="form-group">
                            <strong>Calle:</strong>
                            {{ $direccione->calle }}
                        </div>
                        <div class="form-group">
                            <strong>Num Int:</strong>
                            {{ $direccione->num_int }}
                        </div>
                        <div class="form-group">
                            <strong>Num Ext:</strong>
                            {{ $direccione->num_ext }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo Postal:</strong>
                            {{ $direccione->codigo_postal }}
                        </div>
                        <div class="form-group">
                            <strong>Colonia:</strong>
                            {{ $direccione->colonia }}
                        </div>
                        <div class="form-group">
                            <strong>Municipio:</strong>
                            {{ $direccione->municipio }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $direccione->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Pais:</strong>
                            {{ $direccione->pais }}
                        </div>
                        <div class="form-group">
                            <strong>Es Activo:</strong>
                            {{ $direccione->es_activo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
