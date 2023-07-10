@extends('adminlte::page')

@section('template_title')
    {{ $historialContrato->name ?? 'Show Historial Contrato' }}
@endsection
@if(Auth::check() && Auth::user()->es_activo)

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Historial Contrato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('historial-contratos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $historialContrato->empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Contrato:</strong>
                            {{ $historialContrato->contrato }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif