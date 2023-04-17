<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="col-sm p-1 form-group">
            {{ Form::label('empleado_id', 'Empleado') }}
            <?php $select = $historialContrato->empleado_id ?? [request()->id => request()->nombre]; ?>
            {{ Form::select('empleado_id', $select,null,['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-sm p-1 form-group">
            <?php 
                $fechaInicio =  $historialContrato->fecha_inicio_contrato ? Carbon\Carbon::parse($historialContrato->fecha_inicio_contrato)->format('Y-m-d') : $historialContrato->fecha_inicio_contrato;
            ?>
            {{ Form::label('Fecha Inicio') }}
            {{ Form::date('fecha_inicio_contrato', $fechaInicio, ['class' => 'form-control' . ($errors->has('fecha_inicio_contrato') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
            {!! $errors->first('fecha_inicio_contrato', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-sm p-1 form-group">
            <?php 
                $fechaFin =  $historialContrato->fecha_fin_contrato ? Carbon\Carbon::parse($historialContrato->fecha_fin_contrato)->format('Y-m-d') : $historialContrato->fecha_fin_contrato;
            ?>
            {{ Form::label('Fecha Fin') }}
            {{ Form::date('fecha_fin_contrato', $fechaFin, ['class' => 'form-control' . ($errors->has('fecha_fin_contrato') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
            {!! $errors->first('fecha_fin_contrato', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-sm p-1 form-group">
            {{ Form::label('Subir Contrato') }}
            <input type="file" name="contrato" size="50" class="form-control">
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>