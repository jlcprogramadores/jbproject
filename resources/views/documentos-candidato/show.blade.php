@extends('layouts.app')

@section('template_title')
    {{ $documentosCandidato->name ?? 'Show Documentos Candidato' }}
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Documentos Candidato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('documentos-candidatos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Candidato Id:</strong>
                            {{ $documentosCandidato->candidato_id }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo:</strong>
                            {{ $documentosCandidato->archivo }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Edito:</strong>
                            {{ $documentosCandidato->usuario_edito }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif
