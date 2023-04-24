@extends('layouts.app')

@section('title','Cambio De Estado')
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Cambio De Estado (Alta/baja)</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('historial-altas.storeporempleado') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('historial-alta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif
