@extends('adminlte::page')

@section('template_title')
    {{ $historialParo->name ?? 'Show Historial Paro' }}
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Historial Paro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('historial-paros.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Paro Id:</strong>
                            {{ $historialParo->paro_id }}
                        </div>
                        <div class="form-group">
                            <strong>Grupo Id:</strong>
                            {{ $historialParo->grupo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $historialParo->empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $historialParo->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $historialParo->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Grupo:</strong>
                            {{ $historialParo->nombre_grupo }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $historialParo->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Edito:</strong>
                            {{ $historialParo->usuario_edito }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif
