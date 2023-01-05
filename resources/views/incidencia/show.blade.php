@extends('layouts.app')

@section('title','Mostrar Incidencia')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Incidencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('incidencias.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $incidencia->empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto Id:</strong>
                            {{ $incidencia->proyecto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $incidencia->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $incidencia->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Justificante:</strong>
                            {{ $incidencia->justificante }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $incidencia->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Es Activo:</strong>
                            {{ $incidencia->es_activo }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Edito:</strong>
                            {{ $incidencia->usuario_edito }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
