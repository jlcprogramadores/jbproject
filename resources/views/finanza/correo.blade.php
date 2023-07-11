@extends('adminlte::page')
@section('title','Confirmar Envío Comprobante')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Envío de Correo</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>No:</strong>
                            {{ $finanza->no }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Creacion:</strong>
                            {{ $finanza->fecha_salida ? Carbon\Carbon::parse($finanza->fecha_salida)->format('Y-m-d') : '' }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Entrada:</strong>
                            {{ $finanza->fecha_entrada ? Carbon\Carbon::parse($finanza->fecha_entrada)->format('Y-m-d') : '' }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $finanza->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Monto A Pagar:</strong>
                            <td>{{ '$'. number_format($finanza->monto_a_pagar,2) }}</td>
                        </div>
                        <div class="form-group">
                            <strong>Fecha De Pago:</strong>
                            {{ $finanza->fecha_de_pago ? Carbon\Carbon::parse($finanza->fecha_de_pago)->format('Y-m-d') : '' }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedor:</strong>
                            {{ $proveedor->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Correo Electrónico:</strong>
                            {{ $proveedor->mail }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante:</strong>
                            @if ($salida->comprobante)
                                <a href="{{$salida->comprobante}}">Comprobante</a> 
                            @else
                                <span class="text-danger">Sin Comprobante</span>
                            @endif  
                        </div>
                        <div>
                            <strong>Estado:</strong>
                            @if ($salida->enviado == 1)
                                <span class="text-success">Enviado</span>
                            @else
                                <span class="text-danger">Sin Enviar</span>
                            @endif 
                        </div>
                        <br>
                        <div class="float-right">
                            <a class="btn btn-primary" href="javascript:history.back()"> Atrás</a>
                            @if ($salida->comprobante)
                                <a class="btn btn-success" href="{{ route('finanzas.enviarCorreo',$finanza->id) }}"> Enviar Comprobante</a>
                            @endif   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection