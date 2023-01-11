<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('grupo_id') }}
            {{ Form::text('grupo_id', $gruposEmpleado->grupo_id, ['class' => 'form-control' . ($errors->has('grupo_id') ? ' is-invalid' : ''), 'placeholder' => 'Grupo Id']) }}
            {!! $errors->first('grupo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleado_id') }}
            {{ Form::text('empleado_id', $gruposEmpleado->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => 'Empleado Id']) }}
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('puesto_id') }}
            {{ Form::text('puesto_id', $gruposEmpleado->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Puesto Id']) }}
            {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('salario') }}
            {{ Form::text('salario', $gruposEmpleado->salario, ['class' => 'form-control' . ($errors->has('salario') ? ' is-invalid' : ''), 'placeholder' => 'Salario']) }}
            {!! $errors->first('salario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', $gruposEmpleado->usuario_edito, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>