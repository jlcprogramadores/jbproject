@extends('layouts.app')

@section('title','Actualizar Categoría De Familia')
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Categoría De Familia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias-familias.update', $categoriasFamilia->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
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