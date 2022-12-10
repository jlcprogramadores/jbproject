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
                            <span class="card-title">Mostrar Usuario</span>
                        </div>

                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Es Activo:</strong>
                            @if($user->es_activo   == 1 )
                                <p class="text-success">Activo</p>
                            @else
                                <p class="text-danger">Inactivo</p>
                            @endif
                        </div>
                        <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif