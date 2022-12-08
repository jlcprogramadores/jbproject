@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Rol</span>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $rol->name }}
                        </div>
                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif