@extends('adminlte::page')

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
                        <div class="container text-uppercase">
                            @if ($expedientesCargados)
                                @foreach ($expedientesCargados as $item)
                                    <p class="badge bg-success">Cargado</p>
                                    <a href="{{$item->archivo}}">{{strtr($item->nombre,'_',' ')}}</a>
                                        <br>
                                @endforeach
                            @endif
                            @foreach ($expedienteFaltantes as $item)
                                    <p class="badge bg-danger">Falta</p>
                                    {{strtr($item->nombre,'_',' ')}}
                                    <br>
                            @endforeach
                           <br>
                        </div>
                        <a class="btn btn-primary btn-sm" href="{{ route('empleado-expedientes.index') }}"> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
@endif
    

    