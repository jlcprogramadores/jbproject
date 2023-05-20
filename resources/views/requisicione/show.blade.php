@extends('layouts.app')

@section('title','Mostrar Requisición')
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Requisición</span>
                        </div>
                    </div>

                    <div class="card-body">
                            
                            <div class="form-group">
                                <strong>Folio:</strong>
                                {{ $requisicione->folio }}
                            </div>
                            <div class="form-group">
                                <strong>Departamento:</strong>
                                {{ $requisicione->departamento }}
                            </div>
                            <div class="form-group">
                                <strong>Proyecto:</strong>
                                {{ $requisicione->proyecto }}
                            </div>
                            <div class="form-group">
                                <strong>Justificacion:</strong>
                                {{ $requisicione->justificacion }}
                            </div>
                            <div class="form-group">
                                <strong>Archivo:</strong>
                                {{ $requisicione->archivo }}
                            </div>
                            <div class="form-group">
                                <strong>Esta Aprobada:</strong>
                                {{ $requisicione->esta_aprobada }}
                            </div>
                            <div class="form-group">
                                <strong>Aprobada Por:</strong>
                                {{ $requisicione->aprobada_por }}
                            </div>
                            <div class="form-group">
                                <strong>Aprobada En:</strong>
                                {{ $requisicione->aprobada_en }}
                            </div>
                            <div class="form-group">
                                <strong>Usuario Edito:</strong>
                                {{ $requisicione->usuario_edito }}
                            </div>

                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('requisiciones.index') }}"> Atrás</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
    @endif