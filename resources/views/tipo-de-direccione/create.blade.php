@extends('layouts.app')

@section('title','Crear Tipo De Direccion')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Tipo De Direccion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipo-de-direcciones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tipo-de-direccione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
