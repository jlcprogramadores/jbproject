@extends('adminlte::page')

@section('title','Actualizar Historial Contrato')

@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Historial Contrato</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('historial-contratos.update', $historialContrato->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('historial-contrato.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif