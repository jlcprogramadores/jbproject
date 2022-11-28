@extends('layouts.app')

@section('title','Mostrar Top Egreso')
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Top Egreso</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        @if ($finanza->salidas_id != null)
                            <div class="form-group">
                                <strong>Salidas Id:</strong>
                                {{ $finanza->salidas_id }}
                            </div>
                        @else
                            <div class="form-group">
                                <strong>Entradas Id:</strong>
                                {{ $finanza->entradas_id }}
                            </div>
                        @endif
                        <div class="form-group">
                            <strong>Familia y Categoría:</strong>    
                            {{'F: '. $finanza->famCategoria->familia->nombre}}
                            {{'C: '.$finanza->famCategoria->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Iva:</strong>
                            {{ $finanza->iva->porcentaje }}
                        </div>
                        <div class="form-group">
                            <strong>No:</strong>
                            {{ $finanza->no }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Creacion:</strong>
                            {{ $finanza->fecha_facturacion }}
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
                            <strong>Cantidad:</strong>
                            {{ $finanza->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Unidad:</strong>
                            {{ $finanza->unidad->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Costo Unitario:</strong>
                            {{ $finanza->costo_unitario }}
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
                            <strong>Metodo De Pago:</strong>
                            {{ $finanza->metodo_de_pago }}
                        </div>
                        <div class="form-group">
                            <strong>Entregado Material A:</strong>
                            {{ $finanza->entregado_material_a }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $finanza->comentario }}
                        </div>
                        @if ($finanza->salidas_id != null)
                            @if ($salida->comprobante)
                                <a href="{{$salida->comprobante}}">Comprobante</a> 
                            @else
                                <span class="text-danger">Sin Comprobante</span>
                            @endif  
                        @endif
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('finanzas.topEgreso') }}"> Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif