@extends('adminlte::page')

@section('title','Mostrar Salida')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Salida</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proveedor Id:</strong>
                            {{ $salida->proveedor_id }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante:</strong>
                            <a href="{{$salida->comprobante}}">Comprobante</a>     
                        </div>
                        <br>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('salidas.index') }}"> Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
