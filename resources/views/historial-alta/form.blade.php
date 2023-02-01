<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 p-2 form-group">
                    <label for="">Tipo</label>
                    @if ($historialAlta->tipo)
                    <input type="text" name="" id="" value="Alta" class="form-control" disabled>
                    @else
                    <input type="text" name="" id="" value="Baja" class="form-control" disabled>
                    @endif
                </div>
                <div class="col-sm-5 p-2 form-group">
                    {{ Form::label('empleado_id', 'Empleado') }}
                    {{-- determino si es nuevo o editado --}}
                    @if ($editado)
                        {{ Form::select('empleado_id', $empleado, $historialAlta->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : '')]) }}
                    @else
                        {{ Form::select('empleado_id', $empleado, $historialAlta->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => 'Selcciona el Empleado']) }}
                    @endif
                    {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                {{-- se crea un campo falso para que se puede enviar correctamente el form con d-none --}}
                <div class="col-sm-5 p-2 form-group">
                    {{ Form::label('fecha_suceso', 'Fecha Del Suceso') }}
                    {{ Form::date('fecha_suceso', $historialAlta->fecha_suceso, ['class' => 'form-control' . ($errors->has('fecha_suceso') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('fecha_suceso', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
            </div>
            <div class="row">
                <div class="form-group d-none">
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
            <div class="row d-flex justify-content-center">
                <a href="{{ route('empleados.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
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