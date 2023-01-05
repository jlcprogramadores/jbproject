@extends('layouts.app')

@section('title','Crear Incidencia')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Incidencia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('incidencias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('incidencia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
