
    <div class="box box-info padding-1">
        <div class="box-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm p-1 form-group">
                        {{ Form::label('folio') }}
                        {{ Form::text('folio', $requisicione->folio, ['class' => 'form-control' . ($errors->has('folio') ? ' is-invalid' : ''), 'placeholder' => 'Folio']) }}
                        {!! $errors->first('folio', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-sm p-1 form-group">
                        {{ Form::label('departamento') }}
                        {{ Form::text('departamento', $requisicione->departamento, ['class' => 'form-control' . ($errors->has('departamento') ? ' is-invalid' : ''), 'placeholder' => 'Departamento']) }}
                        {!! $errors->first('departamento', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-sm p-1 form-group">
                        {{ Form::label('proyecto') }}
                        {{ Form::text('proyecto', $requisicione->proyecto, ['class' => 'form-control' . ($errors->has('proyecto') ? ' is-invalid' : ''), 'placeholder' => 'Proyecto']) }}
                        {!! $errors->first('proyecto', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm p-1 form-group">
                        {{ Form::label('justificación') }}
                        {{ Form::text('justificacion', $requisicione->justificacion, ['class' => 'form-control' . ($errors->has('justificacion') ? ' is-invalid' : ''), 'placeholder' => 'Justificación']) }}
                        {!! $errors->first('justificacion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-sm p-1 form-group">
                        {{ Form::label('Archivo de Requisición') }}
                        <input type="file" name="archivo" size="50" class="form-control">
                    </div>
                    <div class="col-sm p-1 form-group">
                        {{ Form::label('esta_aprobada') }}
                        {{ Form::text('esta_aprobada', $requisicione->esta_aprobada, ['class' => 'form-control' . ($errors->has('esta_aprobada') ? ' is-invalid' : ''), 'placeholder' => 'Esta Aprobada']) }}
                        {!! $errors->first('esta_aprobada', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm p-1 form-group">
                        {{ Form::label('aprobada_por') }}
                        {{ Form::text('aprobada_por', $requisicione->aprobada_por, ['class' => 'form-control' . ($errors->has('aprobada_por') ? ' is-invalid' : ''), 'placeholder' => 'Aprobada Por']) }}
                        {!! $errors->first('aprobada_por', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-sm p-1 form-group">
                        {{ Form::label('aprobada_en') }}
                        {{ Form::text('aprobada_en', $requisicione->aprobada_en, ['class' => 'form-control' . ($errors->has('aprobada_en') ? ' is-invalid' : ''), 'placeholder' => 'Aprobada En']) }}
                        {!! $errors->first('aprobada_en', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="form-group d-none">
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <br>
                <div class="row d-flex justify-content-center">
                    <a href="{{ route('requisiciones.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                    <div class="col col-sm-2"></div>
                    <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
@endif