@extends('layouts.app')

@section('template_title')
    Crear Categorias De Entradas
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Categorias De Entrada</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias-de-entradas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('categorias-de-entrada.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
