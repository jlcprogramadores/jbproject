@extends('adminlte::page')
@section('title','Mostrar Entrada')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Entrada</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('entradas.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $entrada->cliente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipodeingreso Id:</strong>
                            {{ $entrada->tipodeingreso_id }}
                        </div>
                        <div class="form-group">
                            <strong>Categorias De Entrada Id:</strong>
                            {{ $entrada->categorias_de_entrada_id }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto Id:</strong>
                            {{ $entrada->proyecto_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
