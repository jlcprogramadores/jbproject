@extends('layouts.app')

@section('title','Mostrar Empleado-Expediente')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">siuu</span>
                        </div>
                        <div class="float-right">
                        </div>
                    </div>
                    
                    <div class="card-body">
                        
                       
                        <a class="btn btn-primary" href="{{ route('empleado-expedientes.index') }}"> Atrás</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    