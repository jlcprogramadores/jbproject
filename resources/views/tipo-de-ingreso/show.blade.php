@extends('adminlte::page')
@section('title','Mostrar Tipo De Direccion')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Tipo De Ingreso</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tipoDeIngreso->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $tipoDeIngreso->descripcion }}
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipo-de-ingresos.index') }}"> Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection