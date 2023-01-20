@extends('layouts.app')

@section('template_title')
    Añadir Empleado al Grupo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Añadir Empleado al Grupo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grupos-empleados.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('grupos-empleado.formEmpleadoGrupo')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
