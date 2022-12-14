@extends('layouts.app')

@section('title', 'Gráfica Ingresos vs Egresos')
@if (Auth::check() && Auth::user()->es_activo)
@can('finanzas.graficas')
    @section('content')
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('finanzas.graficas') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf
                            <div class="col-sm p-1 form-group">
                                <label class="proyecto_id" name="Ingreso_id"
                                    for="Ingreso_id">Proyecto a Gráficar:</label>
                                <br>
                                <select class="form-control" id="proyecto_id" name="proyecto_id">
                                    <option value="" selected="selected">Selecciona Proyecto</option>
                                    @foreach ($proyecto as $val => $name)
                                        <option value="{{ $val }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>  
                            
                            <div class="row justify-content-md-center">
                                <button id="btn_graficar" type="submit" class="btn btn-primary col col-lg-3">Gráficar</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
@endcan
@endif
