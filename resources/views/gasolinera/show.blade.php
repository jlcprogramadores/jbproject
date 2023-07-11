@extends('adminlte::page')
@section('title','Gasolinera')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Gasolinera</span>
                        </div>
                        <div class="float-right">
                            
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $gasolinera->nombre }}
                        </div>
                        <br>
                        <a class="btn btn-primary" href="{{ route('gasolineras.index') }}"> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection