@extends('layouts.app')

@section('title','Mostrar Puesto')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Puesto</span>
                        </div>
                        <div class="float-right">
                            
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $puesto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Actualización:</strong>
                            {{ $puesto->usuario_edito }}
                        </div>
                        <br>
                        <a class="btn btn-primary" href="{{ route('puestos.index') }}"> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
