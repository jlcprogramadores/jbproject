@extends('layouts.app')

@section('template_title')
    {{ $gasolinera->name ?? 'Show Gasolinera' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Gasolinera</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('gasolineras.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $gasolinera->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
