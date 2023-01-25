@extends('layouts.app')

@section('title','Mostrar Finanza')
@if(Auth::check() && Auth::user()->es_activo)
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
                            <strong>Familia y Categoría:</strong>    
                            {{'F: '. $finanza->famCategoria->familia->nombre}}
                            {{'C: '.$finanza->famCategoria->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>IVA:</strong>
                            {{ $finanza->iva->porcentaje }}%
                        </div>
                        <div class="form-group">
                            <strong>No:</strong>
                            {{ $finanza->no }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Creacion:</strong>
                            {{ $finanza->fecha_facturacion ? Carbon\Carbon::parse($finanza->fecha_facturacion)->format('Y-m-d') : '' }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Salida:</strong>
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
                            <strong>Cantidad:</strong>
                            {{ $finanza->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Unidad:</strong>
                            {{ $finanza->unidad->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Costo Unitario:</strong>
                            {{ '$'. number_format($finanza->costo_unitario,2) }}
                        </div>
                        <div class="form-group">
                            <strong>Monto A Pagar:</strong>
                            {{ '$'. number_format($finanza->monto_a_pagar,2) }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha De Pago:</strong>
                            {{ $finanza->fecha_de_pago ? Carbon\Carbon::parse($finanza->fecha_de_pago)->format('Y-m-d') : '' }}
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
                            <a class="btn btn-primary" href="{{ route('finanzas.index') }}" > Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif