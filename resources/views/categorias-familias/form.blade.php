
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="col-sm p-1 form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $categoriasFamilia->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm p-1 form-group">
                    {{ Form::label('familia_id', 'Familia') }}
                    <br>
                    {{ Form::select('familia_id',$familia ,$categoriasFamilia->familia_id, ['class' => 'form-control' . ($errors->has('familia_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Familia']) }}
                    {!! $errors->first('familia_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <div class="row">

                <div class="col-sm p-1 form-group">
                    {{ Form::label(__('descripcion')) }}
                    {{ Form::text('descripcion', $categoriasFamilia->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
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
            <br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('categorias-familias.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endif
@push('scripts')
    <script>
        $('#familia_id').select2();
    </script>
@endpush