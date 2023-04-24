@extends('layouts.app')

@section('template_title')
    {{ $stock->name ?? 'Show Stock' }}
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Stock</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('stocks.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Producto Id:</strong>
                            {{ $stock->producto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedor Id:</strong>
                            {{ $stock->proveedor_id }}
                        </div>
                        <div class="form-group">
                            <strong>Destino:</strong>
                            {{ $stock->destino }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $stock->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Lote:</strong>
                            {{ $stock->lote }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $stock->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Numero Factura:</strong>
                            {{ $stock->numero_factura }}
                        </div>
                        <div class="form-group">
                            <strong>Numero Documento:</strong>
                            {{ $stock->numero_documento }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif
