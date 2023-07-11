@extends('adminlte::page')
@section('title','Crear Registro de Control Gasolinera')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Registro de Control Gasolinera</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('control-gasolineras.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('control-gasolinera.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection