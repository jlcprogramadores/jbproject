@if(\Auth::check())
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $tipoDeDireccione->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <?php $boleano = [ '1' => 'Si', '0' => 'No']; ?>
            {{ Form::label('es_fiscal') }}
            {{ Form::select('es_fiscal', $boleano,$tipoDeDireccione->es_fiscal, ['class' => 'form-control' . ($errors->has('es_fiscal') ? ' is-invalid' : ''), 'placeholder' => 'Es Fiscal']) }}
            {!! $errors->first('es_fiscal', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <br>
        <a href="{{ route('tipo-de-direcciones.index') }}" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@endif