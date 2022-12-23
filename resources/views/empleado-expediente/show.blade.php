@extends('layouts.app')

@section('template_title')
    {{ $empleadoExpediente->name ?? 'Show Empleado Expediente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Empleado Expediente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleado-expedientes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $empleadoExpediente->empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Expediente Id:</strong>
                            {{ $empleadoExpediente->expediente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo:</strong>
                            {{ $empleadoExpediente->archivo }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Edito:</strong>
                            {{ $empleadoExpediente->usuario_edito }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
