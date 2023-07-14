<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 p-1 form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $destino->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <div class="form-group d-none">
                {{ Form::label('usuario_edito') }}
                {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
                {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('destinos.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>
    </div>
</div>