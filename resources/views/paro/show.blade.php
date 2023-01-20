@extends('layouts.app')

@section('title','Mostrar Paro')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Paro</span>
                        </div>
                        <div class="float-right">
                        </div>
                    </div>
                    
                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $paro->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto:</strong>
                            {{ $paro->proyecto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Inicio:</strong>
                            {{ Carbon\Carbon::parse($paro->fecha_inicio)->format('Y-m-d') }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Fin:</strong>
                            {{ Carbon\Carbon::parse($paro->fecha_fin)->format('Y-m-d') }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $paro->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Grupo:</strong>
                            {{ $paro->grupo->nombre }}
                        </div>                        
                        <div class="form-group">
                            <strong>Integrantes:</strong>
                            <br>
                            <ul>
                                @foreach ($paro->grupo->grupoEmpleado as $item)
                                <li>
                                    <strong>{{$item->empleado->nombre}}</strong>
                                    
                                    <ul>
                                        <li>
                                            <strong>Puesto:</strong>
                                            {{$item->puesto->nombre}}

                                        </li>
                                        <li>
                                            <strong>Salario:</strong>
                                            ${{number_format($item->salario,2)}}
                                        </li>
                                    </ul>

                                </li>
                                @endforeach
                            </ul>
                        </div>                        
                        <br>
                        <a class="btn btn-primary" href="{{ route('paros.index') }}"> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
