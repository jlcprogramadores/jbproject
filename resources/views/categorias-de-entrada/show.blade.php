@extends('adminlte::page')
@section('title','Mostar Categorías De Entrada')
@if(Auth::check() && Auth::user()->es_activo) 
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostar Categoría De Entrada</span>
                        </div>
                        
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoriasDeEntrada->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $categoriasDeEntrada->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            @if($categoriasDeEntrada->es_activo  == 1 )
                                <p class="text-success">Activo</p>
                            @else
                                <p class="text-danger">Inactivo</p>

                            @endif
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categorias-de-entradas.index') }}"> Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif