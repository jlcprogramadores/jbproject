<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proveedore_id') }}
            {{ Form::select('proveedore_id',$proveedore,$cuentasBancaria->proveedore_id, ['class' => 'form-control' . ($errors->has('proveedore_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
            {!! $errors->first('proveedore_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('banco') }}
            {{ Form::text('banco', $cuentasBancaria->banco, ['class' => 'form-control' . ($errors->has('banco') ? ' is-invalid' : ''), 'placeholder' => 'Banco']) }}
            {!! $errors->first('banco', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('titular_banco') }}
            {{ Form::text('titular_banco', $cuentasBancaria->titular_banco, ['class' => 'form-control' . ($errors->has('titular_banco') ? ' is-invalid' : ''), 'placeholder' => 'Titular Banco']) }}
            {!! $errors->first('titular_banco', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cuenta') }}
            {{ Form::text('cuenta', $cuentasBancaria->cuenta, ['class' => 'form-control' . ($errors->has('cuenta') ? ' is-invalid' : ''), 'placeholder' => 'Cuenta']) }}
            {!! $errors->first('cuenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clabe') }}
            {{ Form::text('clabe', $cuentasBancaria->clabe, ['class' => 'form-control' . ($errors->has('clabe') ? ' is-invalid' : ''), 'placeholder' => 'Clabe']) }}
            {!! $errors->first('clabe', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tarjeta') }}
            {{ Form::text('tarjeta', $cuentasBancaria->tarjeta, ['class' => 'form-control' . ($errors->has('tarjeta') ? ' is-invalid' : ''), 'placeholder' => 'Tarjeta']) }}
            {!! $errors->first('tarjeta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('es_activo') }}
            {{ Form::text('es_activo', 1, ['class' => 'form-control' . ($errors->has('es_activo') ? ' is-invalid' : ''), 'placeholder' => 'Es Activo']) }}
            {!! $errors->first('es_activo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>