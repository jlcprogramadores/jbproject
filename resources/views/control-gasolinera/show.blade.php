@extends('layouts.app')

@section('template_title')
    {{ $controlGasolinera->name ?? 'Show Control Gasolinera' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Control Gasolinera</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('control-gasolineras.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Gasolinera Id:</strong>
                            {{ $controlGasolinera->gasolinera_id }}
                        </div>
                        <div class="form-group">
                            <strong>Destino Id:</strong>
                            {{ $controlGasolinera->destino_id }}
                        </div>
                        <div class="form-group">
                            <strong>Folio:</strong>
                            {{ $controlGasolinera->folio }}
                        </div>
                        <div class="form-group">
                            <strong>Ticket:</strong>
                            {{ $controlGasolinera->ticket }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $controlGasolinera->producto }}
                        </div>
                        <div class="form-group">
                            <strong>Litros:</strong>
                            {{ $controlGasolinera->litros }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Unitario:</strong>
                            {{ $controlGasolinera->precio_unitario }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $controlGasolinera->total }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $controlGasolinera->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Carga:</strong>
                            {{ $controlGasolinera->carga }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $controlGasolinera->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Folio Factura:</strong>
                            {{ $controlGasolinera->folio_factura }}
                        </div>
                        <div class="form-group">
                            <strong>Total Factura Neto:</strong>
                            {{ $controlGasolinera->total_factura_neto }}
                        </div>
                        <div class="form-group">
                            <strong>Es Pagado:</strong>
                            {{ $controlGasolinera->es_pagado }}
                        </div>
                        <div class="form-group">
                            <strong>Vale Archivo:</strong>
                            {{ $controlGasolinera->vale_archivo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
