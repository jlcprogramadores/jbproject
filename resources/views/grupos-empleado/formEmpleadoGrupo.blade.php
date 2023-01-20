<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group d-none">
            {{ Form::label('grupo_id', 'Grupo') }}
            {{ Form::select('grupo_id',$grupos, $gruposEmpleado->grupo_id, ['class' => 'form-control', 'readonly' => 'true' . ($errors->has('grupo_id') ? ' is-invalid' : ''), 'placeholder' => 'Grupo Id']) }}
            {!! $errors->first('grupo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleado_id', 'Empleado') }}
            {{ Form::select('empleado_id',$empleados, $gruposEmpleado->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Empleado']) }}
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('puesto_id', 'Puesto') }}
            {{ Form::select('puesto_id',$puestos, $gruposEmpleado->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Puesto']) }}
            {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('salario') }}
            {{ Form::text('salario', $gruposEmpleado->salario, ['class' => 'form-control' . ($errors->has('salario') ? ' is-invalid' : ''), 'placeholder' => 'Salario']) }}
            {!! $errors->first('salario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <br>    
        <a href="javascript:history.back()" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>