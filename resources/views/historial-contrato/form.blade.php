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
        <div class="col-sm p-1 form-group">
            {{ Form::label('Subir Contrato') }}
            <input type="file" name="contrato" size="50" class="form-control">
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>