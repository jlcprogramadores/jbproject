    @extends('adminlte::page')
    @section('title', 'Contrato')
    @section('content')
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Contrato</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('empleados.updateContrato',['id' => $empleado->id]) }}" role="form" enctype="multipart/form-data">
                                
                                @csrf

                                <div class="box box-info padding-1">
                                    <div class="container">
                                        <div class="row">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Fechas de contrato</h5>
                                                    <div class="row">
                                                        <div class="col-sm p-1 form-group">
                                                            <?php 
                                                                $fechaInicio =  $empleado->fecha_inicio_contrato ? Carbon\Carbon::parse($empleado->fecha_inicio_contrato)->format('Y-m-d') : $empleado->fecha_inicio_contrato;
                                                            ?>
                                                            {{ Form::label('Fecha Inicio') }}
                                                            {{ Form::date('fecha_inicio_contrato', $fechaInicio, ['class' => 'form-control' . ($errors->has('fecha_inicio_contrato') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
                                                            {!! $errors->first('fecha_inicio_contrato', '<div class="invalid-feedback">:message</div>') !!}
                                                        </div>
                                                        <div class="col-sm p-1 form-group">
                                                            <?php 
                                                                $fechaFin =  $empleado->fecha_fin_contrato ? Carbon\Carbon::parse($empleado->fecha_fin_contrato)->format('Y-m-d') : $empleado->fecha_fin_contrato;
                                                            ?>
                                                            {{ Form::label('Fecha Fin') }}
                                                            {{ Form::date('fecha_fin_contrato', $fechaFin, ['class' => 'form-control' . ($errors->has('fecha_fin_contrato') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
                                                            {!! $errors->first('fecha_fin_contrato', '<div class="invalid-feedback">:message</div>') !!}
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title">Documento de contrato</h5>
                                                    <div class="row">
                                                        @if ($empleado->contrato)
                                                            <div class="col-sm p-1 form-group">
                                                                <label>Contrato Actual</label>
                                                                <br>
                                                                <a href="{{ $empleado->contrato }}" class="btn btn-secondary form-control">Ver Contrato Actual</a>
                                                            </div>
                                                        @endif
                                                        <div class="col-sm p-1 form-group">
                                                            @if ($empleado->contrato)
                                                            {{ Form::label('Sobrescribir Contrato Actual') }}
                                                            @else
                                                            {{ Form::label('Subir Contrato') }}
                                                            @endif
                                                            <input type="file" name="contrato" size="50" class="form-control">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row d-flex justify-content-center">
                                            <a href="{{ route('empleados.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar') }}</a>
                                            <div class="col col-sm-2"></div>
                                            <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
