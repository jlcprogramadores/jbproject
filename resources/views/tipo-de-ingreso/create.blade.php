@extends('layouts.app')

@section('title','Crear Tipo De Ingreso')
@if(\Auth::check())
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Tipo De Ingreso</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipo-de-ingresos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tipo-de-ingreso.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif