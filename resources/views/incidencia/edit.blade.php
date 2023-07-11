@extends('adminlte::page')

@section('title','Editar Incidencia')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Incidencia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('incidencias.update', $incidencia->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('incidencia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
