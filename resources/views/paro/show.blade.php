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
                            <strong>Empleado:</strong>
                            {{ $paro->empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto:</strong>
                            {{ $paro->proyecto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Puesto:</strong>
                            {{ $paro->puesto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Salario:</strong>
                            {{ '$'. number_format($paro->salario,2) }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $paro->comentario }}
                        </div>
                        <br>
                        <a class="btn btn-primary" href="{{ route('paros.index') }}"> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
