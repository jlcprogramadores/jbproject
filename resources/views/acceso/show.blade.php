@extends('layouts.app')

@section('template_title')
    {{ $acceso->name ?? 'Show Acceso' }}
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Acceso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('accesos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $acceso->valor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif
