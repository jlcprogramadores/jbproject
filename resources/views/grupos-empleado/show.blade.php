@extends('adminlte::page')

@section('template_title')
    {{ $gruposEmpleado->name ?? 'Show Grupos Empleado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Grupos Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('grupos-empleados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Grupo Id:</strong>
                            {{ $gruposEmpleado->grupo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $gruposEmpleado->empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Puesto Id:</strong>
                            {{ $gruposEmpleado->puesto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Salario:</strong>
                            {{ $gruposEmpleado->salario }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Edito:</strong>
                            {{ $gruposEmpleado->usuario_edito }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
