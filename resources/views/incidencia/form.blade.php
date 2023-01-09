<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="form-group">
                    {{ Form::label('empleado_id', 'Empleado') }}
                    {{ Form::select('empleado_id',$empleado, $incidencia->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Empleado']) }}
                    {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('proyecto_id', 'Proyecto') }}
                    {{ Form::select('proyecto_id',$proyecto , $incidencia->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Proyecto']) }}
                    {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    <?php 
                        $fechaInicio = isset($incidencia->fecha_inicio) ? Carbon\Carbon::parse($incidencia->fecha_inicio)->format('Y-m-d') : $incidencia->fecha_inicio;
                    ?>
                    {{ Form::label('fecha_inicio') }}
                    {{ Form::date('fecha_inicio', $fechaInicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio']) }}
                    {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    <?php 
                        $fechaFin = isset($incidencia->fecha_fin) ? Carbon\Carbon::parse($incidencia->fecha_fin)->format('Y-m-d') : $incidencia->fecha_fin;
                    ?>
                    {{ Form::label('fecha_fin') }}
                    {{ Form::date('fecha_fin', $fechaFin, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fin']) }}
                    {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm p-1 form-group">
                    {{ Form::label('Fotografía del empleado') }}
                    <label for="justificante"></label>
                    <input type="file" name="justificante" size="50">
                </div>
                <div class="form-group">
                    {{ Form::label('comentario') }}
                    {{ Form::text('comentario', $incidencia->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
                    {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
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
            <div class="row">
                <div class="row justify-content-md-center">
                    <br>
                    <a href="{{ route('incidencias.index') }}" class="btn btn-danger col col-lg-3">{{ __('Cancelar')}}</a>
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
        $('#proyecto_id').select2();
        $('#empleado_id').select2();
    </script>
@endpush