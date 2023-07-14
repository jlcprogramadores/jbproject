
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Clave') }}
            {{ Form::text('valor', $acceso->valor, ['class' => 'form-control' . ($errors->has('valor') ? ' is-invalid' : ''), 'placeholder' => 'Valor']) }}
            {!! $errors->first('valor', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <br>
        <div class="row d-flex justify-content-center">
            <a href="{{ route('accesos.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
            <div class="col col-sm-2"></div>
            <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
        </div>
    </div>
</div>