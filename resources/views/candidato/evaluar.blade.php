@extends('adminlte::page')
@section('title','Evaluación Candidato')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Evaluación Candidato</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('candidatos.update', $candidato->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('candidato.formEvaluacion')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
