@extends('layouts.app')

@section('title','Mostrar Mina')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Mina</span>
                        </div>
                        <div class="float-right">
                            
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $mina->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $mina->abreviacon }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $mina->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Actualización:</strong>
                            {{ $mina->usuario_edito }}
                        </div>
                        <br>
                        <a class="btn btn-primary" href="{{ route('minas.index') }}"> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
