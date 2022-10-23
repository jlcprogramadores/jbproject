@extends('layouts.app')

@section('template_title')
    {{ $sALIDA->name ?? 'Show S A L I D A' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show S A L I D A</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('s-a-l-i-d-a-s.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proveedor Id:</strong>
                            {{ $sALIDA->proveedor_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
