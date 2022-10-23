@extends('layouts.app')
@section('title','Mostar Categorías De Entrada')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostar Categoría De Entrada</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categorias-de-entradas.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoriasDeEntrada->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $categoriasDeEntrada->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Es Activo:</strong>
                            {{ $categoriasDeEntrada->es_activo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
