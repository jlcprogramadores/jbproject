@extends('layouts.app')

@section('template_title')
    {{ $requisicione->name ?? 'Show Requisicione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Requisicione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('requisiciones.index') }}"> Back</a>
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
                            <strong>Comprobante Aprobacion:</strong>
                            {{ $requisicione->comprobante_aprobacion }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Edito:</strong>
                            {{ $requisicione->usuario_edito }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
