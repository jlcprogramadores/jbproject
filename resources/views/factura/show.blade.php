@extends('layouts.app')

@section('title','Mostrar Factura')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Factura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('facturas.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Referencia Factura:</strong>
                            {{ $factura->referencia_factura }}
                        </div>
                        <div class="form-group">
                            <strong>Factura Base64:</strong>
                            {{ $factura->factura_base64 }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $factura->url }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Creacion:</strong>
                            {{ $factura->fecha_creacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Factura:</strong>
                            {{ $factura->fecha_factura }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
