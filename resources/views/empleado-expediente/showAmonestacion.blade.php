@extends('adminlte::page')
@section('title','Cartas Amonestaciones')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Cartas Amonestaciones</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="container text-uppercase">
                            @if (isset($cartasAmo[0]))
                                @foreach ($cartasAmo as $item)
                                    <div class="form-group">
                                        <strong>Carta Amonestación {{++$i}}:</strong>
                                        <a href="{{$item->archivo}}">{{substr($item->archivo,9)}}</a>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group">
                                    <strong>No se ha añadido ninguna Carta Amonestación, se añaden desde "Expediente De Empleado" </strong>
                                </div>
                            @endif
                            <div class="float-right">
                                <br>
                                <a class="btn btn-primary" href="{{ route('empleado-expedientes.index') }}"> Atrás</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
