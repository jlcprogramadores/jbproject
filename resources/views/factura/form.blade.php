<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('referencia_factura') }}
            {{ Form::text('referencia_factura', $factura->referencia_factura, ['class' => 'form-control' . ($errors->has('referencia_factura') ? ' is-invalid' : ''), 'placeholder' => 'Referencia Factura']) }}
            {!! $errors->first('referencia_factura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('factura_base64') }}
            {{ Form::text('factura_base64', $factura->factura_base64, ['class' => 'form-control' . ($errors->has('factura_base64') ? ' is-invalid' : ''), 'placeholder' => 'Factura Base64']) }}
            {!! $errors->first('factura_base64', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('url') }}
            {{ Form::text('url', $factura->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Url']) }}
            {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('fecha_creacion') }}
            {{ Form::date('fecha_creacion', $factura->fecha_creacion, ['class' => 'form-control-sm' . ($errors->has('fecha_creacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Creacion']) }}
            {!! $errors->first('fecha_creacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('fecha_factura') }}
            {{ Form::date('fecha_factura', $factura->fecha_factura, ['class' => 'form-control-sm' . ($errors->has('fecha_factura') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Factura']) }}
            {!! $errors->first('fecha_factura', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>