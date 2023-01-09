<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">


                <div class="form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $candidato->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('genero') }}
                    {{ Form::select('genero', ['0' => 'Masculino', '1' => 'Femenino', '2' => 'Otro'], $candidato->genero, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('genero', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('telefono_personal', 'Teléfono Personal') }}
                    {{ Form::number('telefono_personal', $candidato->telefono_personal, ['class' => 'form-control' . ($errors->has('telefono_personal') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Personal']) }}
                    {!! $errors->first('telefono_personal', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('correo') }}
                    {{ Form::email('correo', $candidato->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                    {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('puesto_id', 'Puesto al que aplica') }}
                    {{ Form::select('puesto_id', $puesto, $candidato->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el Puesto']) }}
                    {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('comentario') }}
                    {{ Form::text('comentario', $candidato->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'comentario']) }}
                    {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                {{ Form::label('Currículum del candidato') }}
                <p>
                    <label for="curriculum"></label>
                    <input type="file" name="curriculum">
                </p>
                <div class="form-group d-none">
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="row justify-content-md-center">
                    <br>
                    <a href="{{ route('candidatos.index') }}" class="btn btn-danger col col-lg-3">{{ __('Cancelar')}}</a>
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
        $('#puesto_id').select2();
    </script>
@endpush