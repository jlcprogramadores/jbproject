<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('salidas_id') }}
            {{ Form::text('salidas_id', $finanza->salidas_id, ['class' => 'form-control' . ($errors->has('salidas_id') ? ' is-invalid' : ''), 'placeholder' => 'Salidas Id']) }}
            {!! $errors->first('salidas_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('entradas_id') }}
            {{ Form::text('entradas_id', $finanza->entradas_id, ['class' => 'form-control' . ($errors->has('entradas_id') ? ' is-invalid' : ''), 'placeholder' => 'Entradas Id']) }}
            {!! $errors->first('entradas_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria_id') }}
            {{ Form::text('categoria_id', $finanza->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('iva_id') }}
            {{ Form::text('iva_id', $finanza->iva_id, ['class' => 'form-control' . ($errors->has('iva_id') ? ' is-invalid' : ''), 'placeholder' => 'Iva Id']) }}
            {!! $errors->first('iva_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('no') }}
            {{ Form::text('no', $finanza->no, ['class' => 'form-control' . ($errors->has('no') ? ' is-invalid' : ''), 'placeholder' => 'No']) }}
            {!! $errors->first('no', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('fecha_salida') }}
            {{ Form::date('fecha_salida', $finanza->fecha_salida, ['class' => 'form-control-sm' . ($errors->has('fecha_salida') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Creacion']) }}
            {!! $errors->first('fecha_salida', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('fecha_facturacion') }}
            {{ Form::date('fecha_facturacion', $finanza->fecha_facturacion, ['class' => 'form-control-sm' . ($errors->has('fecha_facturacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Creacion']) }}
            {!! $errors->first('fecha_facturacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('vence') }}
            {{ Form::text('vence', $finanza->vence, ['class' => 'form-control' . ($errors->has('vence') ? ' is-invalid' : ''), 'placeholder' => 'vence']) }}
            {!! $errors->first('vence', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_entrada') }}
            {{ Form::date('fecha_entrada', $finanza->fecha_entrada, ['class' => 'form-control-sm' . ($errors->has('fecha_entrada') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Entrada']) }}
            {!! $errors->first('fecha_entrada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $finanza->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $finanza->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('unidad_id') }}
            {{ Form::text('unidad_id', $finanza->unidad_id, ['class' => 'form-control' . ($errors->has('unidad_id') ? ' is-invalid' : ''), 'placeholder' => 'Unidad Id']) }}
            {!! $errors->first('unidad_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('costo_unitario') }}
            {{ Form::text('costo_unitario', $finanza->costo_unitario, ['class' => 'form-control' . ($errors->has('costo_unitario') ? ' is-invalid' : ''), 'placeholder' => 'Costo Unitario']) }}
            {!! $errors->first('costo_unitario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('retencion') }}
            {{ Form::text('retencion', $finanza->retencion, ['class' => 'form-control' . ($errors->has('retencion') ? ' is-invalid' : ''), 'placeholder' => 'Retencion']) }}
            {!! $errors->first('retencion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('monto_a_pagar') }}
            {{ Form::text('monto_a_pagar', $finanza->monto_a_pagar, ['class' => 'form-control' . ($errors->has('monto_a_pagar') ? ' is-invalid' : ''), 'placeholder' => 'Monto A Pagar']) }}
            {!! $errors->first('monto_a_pagar', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('fecha_de_pago') }}
            {{ Form::date('fecha_de_pago', $finanza->fecha_de_pago, ['class' => 'form-control-sm' . ($errors->has('fecha_de_pago') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Pago']) }}
            {!! $errors->first('fecha_de_pago', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('metodo_de_pago') }}
            {{ Form::text('metodo_de_pago', $finanza->metodo_de_pago, ['class' => 'form-control' . ($errors->has('metodo_de_pago') ? ' is-invalid' : ''), 'placeholder' => 'Metodo De Pago']) }}
            {!! $errors->first('metodo_de_pago', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('entregado_material_a') }}
            {{ Form::text('entregado_material_a', $finanza->entregado_material_a, ['class' => 'form-control' . ($errors->has('entregado_material_a') ? ' is-invalid' : ''), 'placeholder' => 'Entregado Material A']) }}
            {!! $errors->first('entregado_material_a', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comentario') }}
            {{ Form::text('comentario', $finanza->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
            {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>