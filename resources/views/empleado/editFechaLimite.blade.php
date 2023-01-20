@extends('layouts.app')

@section('title','Actualizar Empleado')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Expediete Empleado </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('empleados.actualizarfechalimite', ['id' => $empleado->id]) }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="container">
                                    {{-- card con datos rqueridos --}}
                                    <div class="row">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Selecciona la Fecha limite para entregar los de expedientes</h5>
                                                <div class="row">
                                                    <div class="col-sm p-1 form-group">
                                                        <?php 
                                                            $fechalimite = isset($empleado->fecha_limite_expediente) ? Carbon\Carbon::parse($empleado->fecha_limite_expediente)->format('Y-m-d') : $empleado->fecha_limite_expediente;
                                                        ?>
                                                        {{ Form::label('fecha_limite_expediente') }}
                                                        {{ Form::date('fecha_limite_expediente', $fechalimite, ['class' => 'form-control' . ($errors->has('fecha_limite_expediente') ? ' is-invalid' : ''), 'placeholder' => 'fecha_limite_expediente']) }}
                                                        {!! $errors->first('fecha_limite_expediente', '<div class="invalid-feedback">:message</div>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                                <br>
                                    <div class="container">
                                        <div class="row justify-content-md-center">
                                            <br>
                                            <a href="{{ route('empleado-expedientes.index') }}" class="btn btn-danger col col-lg-3">{{ __('Cancelar')}}</a>
                                            <br>
                                            <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-lg-3">Aceptar</button>
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
