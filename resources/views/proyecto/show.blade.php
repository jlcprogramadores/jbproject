@extends('adminlte::page')
@section('title','Mostrar Proyecto')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Proyecto</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proyecto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $proyecto->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Número De Proyecto:</strong>
                            {{ $proyecto->numero_de_proyecto }}
                        </div>
                        <div class="form-group">
                            <strong>Presupuesto:</strong>
                            {{ '$'. number_format($proyecto->presupuesto,2) }}
                        </div>
                        <div class="form-group">
                            <strong>Márgen:</strong>
                            {{ '$'. number_format($proyecto->margen,2) }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            @if($proyecto->es_activo  == 1 )
                                <p class="text-success">Activo</p>
                            @else
                                <p class="text-danger">Inactivo</p>

                            @endif
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proyectos.index') }}"> Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection