@extends('adminlte::page')

@section('template_title')
    Actualizar Empleado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                        <div class="card text-white border-secondary">
                            <div class="card-header">
                                <span class="card-title-white border-secondary">Actualizar Empleado: {{$empleados[$gruposEmpleado->empleado_id]}}</span>
                            </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grupos-empleados.update', $gruposEmpleado->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('grupos-empleado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
