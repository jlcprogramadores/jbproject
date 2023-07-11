@extends('adminlte::page')

@section('title','Actualizar Tipo De Dirección')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Tipo De Dirección</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipo-de-direcciones.update', $tipoDeDireccione->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipo-de-direccione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection