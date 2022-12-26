@extends('layouts.app')

@section('title','Actualizar Empleado-Expediente')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Empleado Expediente</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('empleado-expedientes.update', $empleadoExpediente->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('empleado-expediente.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
