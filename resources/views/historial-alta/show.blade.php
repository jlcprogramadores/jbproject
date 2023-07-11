@extends('adminlte::page')

@section('title','Mostrar Alta/baja')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Alta/baja</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('historial-altas.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleado:</strong>
                            {{ $historialAlta->empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $historialAlta->tipo ? 'Alta' : 'Baja' }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $historialAlta->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Edito:</strong>
                            {{ $historialAlta->usuario_edito }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
