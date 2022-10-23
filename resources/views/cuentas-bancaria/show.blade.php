@extends('layouts.app')

@section('template_title')
    {{ $cuentasBancaria->name ?? 'Show Cuentas Bancaria' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cuentas Bancaria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cuentas-bancarias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proveedor:</strong>
                            {{ $cuentasBancaria->proveedore_id }}
                        </div>
                        <div class="form-group">
                            <strong>Banco:</strong>
                            {{ $cuentasBancaria->banco }}
                        </div>
                        <div class="form-group">
                            <strong>Titular Banco:</strong>
                            {{ $cuentasBancaria->titular_banco }}
                        </div>
                        <div class="form-group">
                            <strong>Cuenta:</strong>
                            {{ $cuentasBancaria->cuenta }}
                        </div>
                        <div class="form-group">
                            <strong>Clabe:</strong>
                            {{ $cuentasBancaria->clabe }}
                        </div>
                        <div class="form-group">
                            <strong>Tarjeta:</strong>
                            {{ $cuentasBancaria->tarjeta }}
                        </div>
                        <div class="form-group">
                            <strong>Es Activo:</strong>
                            {{ $cuentasBancaria->es_activo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
