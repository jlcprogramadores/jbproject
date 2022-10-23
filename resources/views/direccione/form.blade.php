<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tipo_de_direccione_id') }}
            {{ Form::select('tipo_de_direccione_id',$tipodedireccione, $direccione->tipo_de_direccione_id, ['class' => 'form-control' . ($errors->has('tipo_de_direccione_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo De Direccione Id']) }}
            {!! $errors->first('tipo_de_direccione_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cliente_id') }}
            {{ Form::select('cliente_id',$cliente, $direccione->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Cliente Id']) }}
            {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proveedor_id') }}
            {{ Form::select('proveedor_id',$proveedores, $direccione->proveedor_id, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor Id']) }}
            {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('calle') }}
            {{ Form::text('calle', $direccione->calle, ['class' => 'form-control' . ($errors->has('calle') ? ' is-invalid' : ''), 'placeholder' => 'Calle']) }}
            {!! $errors->first('calle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('num_int') }}
            {{ Form::text('num_int', $direccione->num_int, ['class' => 'form-control' . ($errors->has('num_int') ? ' is-invalid' : ''), 'placeholder' => 'Num Int']) }}
            {!! $errors->first('num_int', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('num_ext') }}
            {{ Form::text('num_ext', $direccione->num_ext, ['class' => 'form-control' . ($errors->has('num_ext') ? ' is-invalid' : ''), 'placeholder' => 'Num Ext']) }}
            {!! $errors->first('num_ext', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('codigo_postal') }}
            {{ Form::text('codigo_postal', $direccione->codigo_postal, ['class' => 'form-control' . ($errors->has('codigo_postal') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Postal']) }}
            {!! $errors->first('codigo_postal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('colonia') }}
            {{ Form::text('colonia', $direccione->colonia, ['class' => 'form-control' . ($errors->has('colonia') ? ' is-invalid' : ''), 'placeholder' => 'Colonia']) }}
            {!! $errors->first('colonia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('municipio') }}
            {{ Form::text('municipio', $direccione->municipio, ['class' => 'form-control' . ($errors->has('municipio') ? ' is-invalid' : ''), 'placeholder' => 'Municipio']) }}
            {!! $errors->first('municipio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $direccione->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pais') }}
            {{ Form::text('pais', $direccione->pais, ['class' => 'form-control' . ($errors->has('pais') ? ' is-invalid' : ''), 'placeholder' => 'Pais']) }}
            {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
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