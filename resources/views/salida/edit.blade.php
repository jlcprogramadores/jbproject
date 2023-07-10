@extends('adminlte::page')

@section('title','Actualizar Salida')
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Salida</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('salidas.update', $salida->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('salida.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif
