@extends('adminlte::page')

@section('title','Crear Grupo de Empleados')
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Grupo de Empleados</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grupos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('grupo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif