<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="form-group">
                    {{ Form::label('empleado_id', 'Empleado') }}
                    {{-- determino si es nuevo o editado --}}
                    @if ($historialAlta->tipo)
                        {{ Form::select('empleado_id', $empleado, $historialAlta->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : '')]) }}
                    @else
                        {{ Form::select('empleado_id', $empleado, $historialAlta->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => 'Selcciona el Empleado']) }}
                    @endif
                    {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('tipo') }}
                    {{ Form::select('tipo', [ '0' => 'Baja', '1' => 'Alta'], $historialAlta->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('comentario') }}
                    {{ Form::text('comentario', $historialAlta->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
                    {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group d-none">
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="row justify-content-md-center">
                    <br>
                    <a href="{{ route('historial-altas.index') }}" class="btn btn-danger col col-lg-3">{{ __('Cancelar')}}</a>
                    <br>
                    <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-lg-3">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#empleado_id').select2();
    </script>
@endpush