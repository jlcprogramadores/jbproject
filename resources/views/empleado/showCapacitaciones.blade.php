@extends('layouts.app')

@section('title','Mostrar Capacitaciones')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Capacitaciones</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="container text-uppercase">
                            @if (isset($capacitaciones[0]))
                                @foreach ($capacitaciones as $item)
                                    <div class="form-group">
                                        <strong>Capacitacion {{++$i}}:</strong>
                                        <a href="{{$item->archivo}}">{{substr($item->archivo,9)}}</a>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group">
                                    <strong>No se ha añadido ninguna capacitación al expediente</strong>
                                </div>
                            @endif
                            <div class="float-right">
                                <br>
                                <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Atrás</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
