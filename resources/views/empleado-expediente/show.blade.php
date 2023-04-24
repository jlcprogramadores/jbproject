@extends('layouts.app')

@section('title','Mostrar Expediente')
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Expediente</span>
                        </div>
                        <div class="float-right">
                        </div>
                    </div>
                    
                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleado:</strong>
                            {{ $empleadoExpediente->empleado->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Expediente:</strong>
                            {{ $empleadoExpediente->expediente->nombre}}
                        </div>
                        @if ($empleadoExpediente->archivo)
                            <a href="{{$empleadoExpediente->archivo}}">Archivo: {{$empleadoExpediente->expediente->nombre}}</a> 
                        @else
                            <span class="text-danger">Sin Archivo</span>
                        @endif  
                        <br>
                        <br>
                        <a class="btn btn-primary" href="{{ route('empleado-expedientes.editExpediente', ['id' => $empleadoExpediente->empleado_id]) }}"><i class="fa fa-fw fa-edit"></i> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
@endif
    