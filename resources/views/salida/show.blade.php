@extends('layouts.app')

@section('template_title')
    {{ $salida->name ?? 'Show Salida' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Salida</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('salidas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proveedor Id:</strong>
                            {{ $salida->proveedor_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
