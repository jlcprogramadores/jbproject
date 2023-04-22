@extends('layouts.app')

@section('title','Mostrar Producto')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $producto->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $producto->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $producto->marca }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $producto->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Unitario:</strong>
                            {{ $producto->precio_unitario }}
                        </div>
                        <div class="form-group">
                            <strong>Minimo:</strong>
                            {{ $producto->minimo }}
                        </div>
                        <div class="form-group">
                            <strong>Maximo:</strong>
                            {{ $producto->maximo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
