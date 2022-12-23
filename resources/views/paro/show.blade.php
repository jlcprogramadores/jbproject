@extends('layouts.app')

@section('template_title')
    {{ $paro->name ?? 'Show Paro' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Paro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('paros.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $paro->empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto Id:</strong>
                            {{ $paro->proyecto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Puesto Id:</strong>
                            {{ $paro->puesto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Salario:</strong>
                            {{ $paro->salario }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $paro->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Edito:</strong>
                            {{ $paro->usuario_edito }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
