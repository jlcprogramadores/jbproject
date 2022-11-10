@extends('layouts.app')



@if(\Auth::check())
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
                        ¡Bievenido(a) {{ Auth::user()->name }}!
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@else
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Salida de Sesión') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    ¡Cerraste sesión exitosamente!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endif