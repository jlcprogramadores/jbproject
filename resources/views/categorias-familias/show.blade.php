@extends('layouts.app')

@section('title','Mostrar Categoría De Familia')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostar Categorías De Familias</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categorias-familias.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Familia Id:</strong>
                            {{ $categoriasFamilia->familia_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoriasFamilia->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $categoriasFamilia->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            @if($categoriasFamilia->es_activo  == 1 )
                                <p class="text-success">Activo</p>
                            @else
                                <p class="text-danger">Inactivo</p>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
