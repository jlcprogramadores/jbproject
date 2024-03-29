@extends('adminlte::page')

@section('title','Mostrar cuenta bancarias')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Cuenta Bancaria</span>
                        </div>
                        <div class="float-right">
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
                            <strong>Estado:</strong>
                            @if($cuentasBancaria->es_activo  == 1 )
                            <p class="text-success">Activo</p>
                            @else
                            <p class="text-danger">Inactivo</p>
                            
                            @endif
                        </div>
                        <a class="btn btn-primary" href="{{ route('cuentas-bancarias.cuentabancariaproveedor', ['id' => $cuentasBancaria->proveedore_id ])}}"><i class="fa fa-fw fa-edit"></i> Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection