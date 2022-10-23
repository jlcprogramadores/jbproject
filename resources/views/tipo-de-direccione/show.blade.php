@extends('layouts.app')

@section('template_title')
    {{ $tipoDeDireccione->name ?? 'Show Tipo De Direccione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tipo De Direccione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipo-de-direcciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tipoDeDireccione->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Es Fiscal:</strong>
                            {{ $tipoDeDireccione->es_fiscal }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
