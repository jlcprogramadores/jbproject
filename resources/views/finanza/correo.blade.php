@extends('layouts.app')

@section('title','Confirmar Envío Comprobante')
@if(\Auth::check())
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Finanza</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>No:</strong>
                            {{ $finanza->no }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Creacion:</strong>
                            {{ $finanza->fecha_salida }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Entrada:</strong>
                            {{ $finanza->fecha_entrada }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $finanza->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Monto A Pagar:</strong>
                            {{ $finanza->monto_a_pagar }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha De Pago:</strong>
                            {{ $finanza->fecha_de_pago }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante:</strong>
                            <a href="{{$salida->comprobante}}">Comprobante</a>     
                        </div>
                        <br>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('finanzas.index') }}"> Atrás</a>
                            <a class="btn btn-success" href="{{ route('finanzas.index') }}"> Enviar Comprobante</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif