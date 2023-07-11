@extends('adminlte::page')

@section('title','Mostrar Proveedor')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Proveedor</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proveedore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Razón Social:</strong>
                            {{ $proveedore->razon_social }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $proveedore->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Días De Crédito:</strong>
                            {{ $proveedore->dias_de_credito }}
                        </div>
                        <div class="form-group">
                            <strong>Monto De Crédito:</strong>
                            {{ '$'. number_format($proveedore->monto_de_credito,2) }}
                        </div>
                        <div class="form-group">
                            <strong>Es Facturable:</strong>
                            @if($proveedore->es_facturable  == 1 )
                                <p style="display:inline" class="text-success">Facturable</p>
                            @else
                                <p style="display:inline" class="text-danger">No Facturable</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $proveedore->mail }}
                        </div>
                        <div class="form-group">
                            <strong>RFC:</strong>
                            {{ $proveedore->rfc }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            @if($proveedore->es_activo  == 1 )
                                <p style="display:inline" class="text-success">Activo</p>
                            @else
                                <p style="display:inline" class="text-danger">Inactivo</p>
                            @endif
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proveedores.index') }}"> Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection