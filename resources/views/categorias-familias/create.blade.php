@extends('adminlte::page')
@section('title','Crear Categoría De Familia')
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Categoría De Familia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias-familias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('categorias-familias.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif