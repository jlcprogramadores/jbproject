@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="form-group">
                    @csrf
                    {{ Form::label('abreviación') }}
                    {{ Form::text('nombre', $unidade->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''),"onkeyup"=>"mayus(this);" ,'placeholder' => 'abreviación']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    @csrf
                    {{ Form::label('descripción') }}
                    {{ Form::text('descripcion', $unidade->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group d-none">
                    @csrf
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('unidades.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endif
@push('scripts')
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>
@endpush