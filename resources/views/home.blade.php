@extends('adminlte::page')
@section('title','¡Bienvenido(a)!')
@if (Auth::check() && Auth::user()->es_activo == 0)
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Inicio de Sesión Exitoso') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <h5 class="text-danger">¡El usuario aún se encuentra inactivo, pide al un admnistrador(a) que lo active!</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endif
@if (Auth::check() && Auth::user()->es_activo == 1)
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Inicio de Sesión Exitoso') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        ¡Bienvenido(a) {{ Auth::user()->name }}!
                        <a class="navbar-brand" href="{{ url('login') }}"><br>
                            {{-- <img src="{{ asset('images/jbind_bienvenida.jpg') }}" class="img-fluid"> --}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection    
@endif
@if (Auth::check() == false)
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Por favor Inicia Sesión') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        ¡Aún no te has identificado!
                        <script>window.location = "{{ route('login') }}";</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endif


<style>
.responsive {
    max-width: 100%;
    height: 100%;
}
</style>