@extends('adminlte::page')

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
                            
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleado:</strong>
                            {{ $incidencia->empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto:</strong>
                            {{ $incidencia->proyecto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{Carbon\Carbon::parse($incidencia->fecha_inicio)->format('Y-m-d')}}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ Carbon\Carbon::parse($incidencia->fecha_fin)->format('Y-m-d')}}
                        </div>
                        <div class="form-group">
                            <strong>Justificante:</strong>
                            <a href="{{$incidencia->justificante}}">Ver Justificante</a>
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $incidencia->comentario }}
                        </div>
                        <br>
                        <a class="btn btn-primary" href="{{ route('incidencias.index') }}"> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
