<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('folio') }}
            {{ Form::text('folio', $requisicione->folio, ['class' => 'form-control' . ($errors->has('folio') ? ' is-invalid' : ''), 'placeholder' => 'Folio']) }}
            {!! $errors->first('folio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('departamento') }}
            {{ Form::text('departamento', $requisicione->departamento, ['class' => 'form-control' . ($errors->has('departamento') ? ' is-invalid' : ''), 'placeholder' => 'Departamento']) }}
            {!! $errors->first('departamento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proyecto') }}
            {{ Form::text('proyecto', $requisicione->proyecto, ['class' => 'form-control' . ($errors->has('proyecto') ? ' is-invalid' : ''), 'placeholder' => 'Proyecto']) }}
            {!! $errors->first('proyecto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('justificacion') }}
            {{ Form::text('justificacion', $requisicione->justificacion, ['class' => 'form-control' . ($errors->has('justificacion') ? ' is-invalid' : ''), 'placeholder' => 'Justificacion']) }}
            {!! $errors->first('justificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo') }}
            {{ Form::text('archivo', $requisicione->archivo, ['class' => 'form-control' . ($errors->has('archivo') ? ' is-invalid' : ''), 'placeholder' => 'Archivo']) }}
            {!! $errors->first('archivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('esta_aprobada') }}
            {{ Form::text('esta_aprobada', $requisicione->esta_aprobada, ['class' => 'form-control' . ($errors->has('esta_aprobada') ? ' is-invalid' : ''), 'placeholder' => 'Esta Aprobada']) }}
            {!! $errors->first('esta_aprobada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('aprobada_por') }}
            {{ Form::text('aprobada_por', $requisicione->aprobada_por, ['class' => 'form-control' . ($errors->has('aprobada_por') ? ' is-invalid' : ''), 'placeholder' => 'Aprobada Por']) }}
            {!! $errors->first('aprobada_por', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('aprobada_en') }}
            {{ Form::text('aprobada_en', $requisicione->aprobada_en, ['class' => 'form-control' . ($errors->has('aprobada_en') ? ' is-invalid' : ''), 'placeholder' => 'Aprobada En']) }}
            {!! $errors->first('aprobada_en', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comprobante_aprobacion') }}
            {{ Form::text('comprobante_aprobacion', $requisicione->comprobante_aprobacion, ['class' => 'form-control' . ($errors->has('comprobante_aprobacion') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Aprobacion']) }}
            {!! $errors->first('comprobante_aprobacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', $requisicione->usuario_edito, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>