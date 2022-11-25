@extends('layouts.app')
@section('title', 'Finanzas')
@if (Auth::check() && Auth::user()->es_activo)
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card text-white border-secondary">
                        <div class="card-header bg-secondary">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('Filtros') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('finanzas.egreso') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Crear Egresos') }}
                                    </a>
                                    <a href="{{ route('finanzas.ingreso') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Crear Ingresos') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <h1 style="color: black">heyyy</h1>
                            <h1 style="color: black">heyyy</h1>
                            <h1 style="color: black">heyyy</h1>
                            <h1 style="color: black">heyyy</h1>
                            <h1 style="color: black">heyyy</h1>
                            <h1 style="color: black">heyyy</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
