<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('nombre', $paro->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Grupo') }}
            {{ Form::select('grupo_id',$grupo, $paro->grupo_id, ['class' => 'form-control' . ($errors->has('grupo_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Grupo']) }}
            {!! $errors->first('grupo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Proyecto') }}
            {{ Form::select('proyecto_id',$proyecto, $paro->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Proyecto']) }}
            {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="p-1 form-group">
            {{ Form::label('fecha_inicio') }}
            {{ Form::date('fecha_inicio', $paro->fecha_inicio, ['class' => 'form-control-sm' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Pago']) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">Campo requerido *</div>') !!}
        </div>
        <div class="p-1 form-group">
            {{ Form::label('fecha_fin') }}
            {{ Form::date('fecha_fin', $paro->fecha_fin, ['class' => 'form-control-sm' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Pago']) }}
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback">Campo requerido *</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comentario') }}
            {{ Form::text('comentario', $paro->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
            {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <br>
        <a href="{{ route('paros.index') }}" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>