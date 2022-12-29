@extends('layouts.app')

@section('title','Mostrar Empleado-Expediente')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Expediente del Empleado</span>
                        </div>
                        <div class="float-right">
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="container text-uppercase">
                            
                            @foreach ($expedientesCargados as $item)
                                <p class="badge bg-success">Cargado</p>
                                    {{strtr($item->nombre,'_',' ')}}
                                    <br>
                            @endforeach
                            @foreach ($expedienteFaltantes as $item)
                                    <p class="badge bg-danger">Falta</p>
                                    {{strtr($item->nombre,'_',' ')}}
                                    <br>
                            @endforeach
                           <br>
                            <a class="btn btn-primary" href="{{ route('empleado-expedientes.index') }}"> Atrás</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    