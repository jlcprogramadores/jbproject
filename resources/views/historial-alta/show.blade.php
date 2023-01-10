@extends('layouts.app')

@section('template_title')
    {{ $historialAlta->name ?? 'Show Historial Alta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Historial Alta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('historial-altas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $historialAlta->empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $historialAlta->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $historialAlta->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Edito:</strong>
                            {{ $historialAlta->usuario_edito }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
