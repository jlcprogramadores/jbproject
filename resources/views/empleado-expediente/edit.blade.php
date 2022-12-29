@extends('layouts.app')

@section('title','Actualizar Empleado-Expediente')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Cambiar Archivo del Expediente</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('empleado-expedientes.update',  $empleadoExpediente->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                            
                                    <div class="form-group d-none">
                                        {{ Form::label('empleado_id') }}
                                        {{ Form::text('empleado_id', $empleadoExpediente->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => 'Empleado Id']) }}
                                        {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group d-none">
                                        {{ Form::label('expediente_id') }}
                                        {{ Form::text('expediente_id', $empleadoExpediente->expediente_id, ['class' => 'form-control' . ($errors->has('expediente_id') ? ' is-invalid' : ''), 'placeholder' => 'Expediente Id']) }}
                                        {!! $errors->first('expediente_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    {{ Form::label('Archivo nuevo') }}
                                        <p>
                                            <label for="archivo"></label>
                                            <input type="file" name="archivo">
                                        </p>
                                    <br>
                                    <div class="form-group d-none">
                                        {{ Form::label('usuario_edito') }}
                                        {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
                                        {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                            
                                </div>
                                <div class="box-footer mt20">
                                    <br>
                                    <a href="javascript:history.back()" class="btn btn-danger ">{{ __('Cancelar')}}</a>
                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
