@extends('adminlte::page')

@section('title','Crear Candidato')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Candidato</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('candidatos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('candidato.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
