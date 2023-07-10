@extends('adminlte::page')

@section('template_title')
    Create Archivo
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Archivo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('archivos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('archivo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif
