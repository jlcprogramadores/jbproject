@extends('adminlte::page')
@section('title','Mostrar Expediente')

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
                            <strong>Nombre:</strong>
                            {{ $expediente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Es Multiple:</strong>
                            @if($expediente->es_multiple  != 0 )
                                <span class="text-success">Sí</span>
                            @else
                                <span class="text-danger">No</span>
                            @endif
                        </div>
                        <br>
                        <a class="btn btn-primary" href="{{ route('expedientes.index') }}"> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
