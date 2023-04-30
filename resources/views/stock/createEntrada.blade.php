@extends('layouts.app')

@section('title','Crear Entrada')
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Entrada</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('stocks.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('stock.formEntrada')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif