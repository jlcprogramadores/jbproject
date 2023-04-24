@extends('layouts.app')

@section('template_title')
Create Historial Contrato
@endsection
@if(Auth::check() && Auth::user()->es_activo)

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Historial Contrato</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('historial-contratos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('historial-contrato.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif