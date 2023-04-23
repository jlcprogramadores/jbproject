@extends('layouts.app')

@section('title','Mostrar Control de Gasolinera')
@if(Auth::check() && Auth::user()->es_activo)


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Control de Gasolinera</span>
                        </div>
                        
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Gasolinera:</strong>
                            {{ $controlGasolinera->gasolinera->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Destino:</strong>
                            {{ $controlGasolinera->destino->nombre }}
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
                            <td>{{ '$'. number_format($controlGasolinera->precio_unitario,2) }}</td>
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            <td>{{ '$'. number_format($controlGasolinera->total,2) }}</td>
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{$controlGasolinera->fecha ? Carbon\Carbon::parse($controlGasolinera->fecha_de_pago)->format('Y-m-d') : ''}}
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
                            <td>{{ '$'. number_format($controlGasolinera->total_factura_neto,2) }}</td>
                        </div>
                        <div class="form-group">
                            <strong>Esta Pagado:</strong>
                            @if ($controlGasolinera['es_pagado'])
                                <td><p class="badge bg-success">Pagado</p></td>
                            @else
                                <td><p class="badge bg-danger">Sin Pagar</p></td>
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Vale Archivo:</strong>
                            {{ $controlGasolinera->vale_archivo }}
                        </div>
                        <br>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('control-gasolineras.index') }}"> Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif