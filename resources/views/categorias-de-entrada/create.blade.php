@extends('layouts.app')
@section('title','Crear Categorías De Entradas')
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Categorías De Entrada</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias-de-entradas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('categorias-de-entrada.form')

                            {{-- Push de prueba --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif