@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('familia_id', 'Familia') }}
            {{ Form::select('familia_id',$familia ,$categoriasFamilia->familia_id, ['class' => 'form-control' . ($errors->has('familia_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Familia']) }}
            {!! $errors->first('familia_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $categoriasFamilia->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $categoriasFamilia->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('es_activo') }}
            {{ Form::text('es_activo', 1, ['class' => 'form-control' . ($errors->has('es_activo') ? ' is-invalid' : ''), 'placeholder' => 'Es Activo']) }}
            {!! $errors->first('es_activo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <br>
        <a href="{{ route('categorias-familias.index') }}" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@endif
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#familia_id').select2();
    </script>
@endpush