@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="col-sm p-1 form-group">
                    {{ Form::label('empleado_id', 'Empleado') }}
                    <?php $select = $historialContrato->empleado_id ? [$historialContrato->empleado_id => $historialContrato->empleado->nombre] : [request()->id => request()->nombre]; ?>
                    {{ Form::select('empleado_id', $select,null,['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm p-1 form-group">
                    <?php 
                        $fechaInicio =  $historialContrato->fecha_inicio ? Carbon\Carbon::parse($historialContrato->fecha_inicio)->format('Y-m-d') : $historialContrato->fecha_inicio;
                    ?>
                    {{ Form::label('Fecha Inicio') }}
                    {{ Form::date('fecha_inicio', $fechaInicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
                    {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm p-1 form-group">
                    <?php 
                        $fechaFin =  $historialContrato->fecha_fin ? Carbon\Carbon::parse($historialContrato->fecha_fin)->format('Y-m-d') : $historialContrato->fecha_fin;
                    ?>
                    {{ Form::label('Fecha Fin') }}
                    {{ Form::date('fecha_fin', $fechaFin, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
                    {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm p-1 form-group">
                    @if ($historialContrato->contrato)
                        <label for="contrato">
                            Contrato (<a href="{{ $historialContrato->contrato }}" target="_blank">Ver contrato anterior</a>, si subes una imgen se va a sobrescribir)
                        </label>
                    @else
                        <label for="contrato">Contrato</label>
                    @endif
                    <input type="file" name="contrato" size="50" class="form-control">
                </div>
                <div class="form-group d-none">
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('historial-contrato.index',$historialContrato->empleado_id ?? request()->id ) }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endif