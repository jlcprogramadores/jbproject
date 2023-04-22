<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('gasolinera_id') }}
            {{ Form::text('gasolinera_id', $controlGasolinera->gasolinera_id, ['class' => 'form-control' . ($errors->has('gasolinera_id') ? ' is-invalid' : ''), 'placeholder' => 'Gasolinera Id']) }}
            {!! $errors->first('gasolinera_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('destino_id') }}
            {{ Form::text('destino_id', $controlGasolinera->destino_id, ['class' => 'form-control' . ($errors->has('destino_id') ? ' is-invalid' : ''), 'placeholder' => 'Destino Id']) }}
            {!! $errors->first('destino_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('folio') }}
            {{ Form::text('folio', $controlGasolinera->folio, ['class' => 'form-control' . ($errors->has('folio') ? ' is-invalid' : ''), 'placeholder' => 'Folio']) }}
            {!! $errors->first('folio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ticket') }}
            {{ Form::text('ticket', $controlGasolinera->ticket, ['class' => 'form-control' . ($errors->has('ticket') ? ' is-invalid' : ''), 'placeholder' => 'Ticket']) }}
            {!! $errors->first('ticket', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('producto') }}
            {{ Form::text('producto', $controlGasolinera->producto, ['class' => 'form-control' . ($errors->has('producto') ? ' is-invalid' : ''), 'placeholder' => 'Producto']) }}
            {!! $errors->first('producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('litros') }}
            {{ Form::text('litros', $controlGasolinera->litros, ['class' => 'form-control' . ($errors->has('litros') ? ' is-invalid' : ''), 'placeholder' => 'Litros']) }}
            {!! $errors->first('litros', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_unitario') }}
            {{ Form::text('precio_unitario', $controlGasolinera->precio_unitario, ['class' => 'form-control' . ($errors->has('precio_unitario') ? ' is-invalid' : ''), 'placeholder' => 'Precio Unitario']) }}
            {!! $errors->first('precio_unitario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total') }}
            {{ Form::text('total', $controlGasolinera->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $controlGasolinera->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('carga') }}
            {{ Form::text('carga', $controlGasolinera->carga, ['class' => 'form-control' . ($errors->has('carga') ? ' is-invalid' : ''), 'placeholder' => 'Carga']) }}
            {!! $errors->first('carga', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comentario') }}
            {{ Form::text('comentario', $controlGasolinera->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
            {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('folio_factura') }}
            {{ Form::text('folio_factura', $controlGasolinera->folio_factura, ['class' => 'form-control' . ($errors->has('folio_factura') ? ' is-invalid' : ''), 'placeholder' => 'Folio Factura']) }}
            {!! $errors->first('folio_factura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total_factura_neto') }}
            {{ Form::text('total_factura_neto', $controlGasolinera->total_factura_neto, ['class' => 'form-control' . ($errors->has('total_factura_neto') ? ' is-invalid' : ''), 'placeholder' => 'Total Factura Neto']) }}
            {!! $errors->first('total_factura_neto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('es_pagado') }}
            {{ Form::text('es_pagado', $controlGasolinera->es_pagado, ['class' => 'form-control' . ($errors->has('es_pagado') ? ' is-invalid' : ''), 'placeholder' => 'Es Pagado']) }}
            {!! $errors->first('es_pagado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('vale_archivo') }}
            {{ Form::text('vale_archivo', $controlGasolinera->vale_archivo, ['class' => 'form-control' . ($errors->has('vale_archivo') ? ' is-invalid' : ''), 'placeholder' => 'Vale Archivo']) }}
            {!! $errors->first('vale_archivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>