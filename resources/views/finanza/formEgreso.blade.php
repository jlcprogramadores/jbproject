@if(\Auth::check())
<div class="box box-info padding-1">
    <div class="container">
        <!-- estilo a partir de balsmiq  -->
        <div class="row">
            <div class="col-sm p-1 form-group">
                {{ Form::label('proyecto') }}
                {{ Form::select('proyecto_id',$datosproyecto, $finanza->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Proyecto']) }}
                {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <!-- para poder llenar categoria_id se requiere:
            selecionar una familia, para que cargen las categorias de dicha familia -->
            <div class="col-sm p-1 form-group">
                {{ Form::label('familia') }}
                {{ Form::select('Selecciona Familia',$datosfamilia, $finanza->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Familia']) }}
                {!! $errors->first('entradas_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-sm p-1 form-group">
                {{ Form::label('Categoria') }}
                {{ Form::select('categoria_id',$datoscategoriasfamilia, $finanza->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Categoria']) }}
                {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
        <div class="row">
            <!-- datos de ingreso -->
            <div class="col-sm">
                <div class="p-1 form-group">
                    {{ Form::label('proveedor') }}
                    {{ Form::select('proveedor_id',$datosproveedor, $salida->proveedor_id, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Proveedor']) }}
                    {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('no') }}
                    {{ Form::text('no', $finanza->no, ['class' => 'form-control' . ($errors->has('no') ? ' is-invalid' : ''), 'placeholder' => 'No']) }}
                    {!! $errors->first('no', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('fecha_entrada') }}
                    {{ Form::date('fecha_entrada', $finanza->fecha_entrada, ['class' => 'form-control-sm' . ($errors->has('fecha_entrada') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Entrada']) }}
                    {!! $errors->first('fecha_entrada', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <!-- ocupa el campo de fecha facturacion no de salida -->
                <div class="p-1 form-group">
                    {{ Form::label('fecha_salida') }}
                    {{ Form::date('fecha_salida', $finanza->fecha_salida, ['class' => 'form-control-sm' . ($errors->has('fecha_salida') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Creacion']) }}
                    {!! $errors->first('fecha_salida', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('vence') }}
                    {{ Form::number('vence', $finanza->vence, ['class' => 'form-control' . ($errors->has('vence') ? ' is-invalid' : ''), 'placeholder' => 'vence']) }}
                    {!! $errors->first('vence', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('descripción') }}
                    {{ Form::text('descripcion', $finanza->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('comentario') }}
                    {{ Form::text('comentario', $finanza->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
                    {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('entregado_material_a') }}
                    {{ Form::text('entregado_material_a', $finanza->entregado_material_a, ['class' => 'form-control' . ($errors->has('entregado_material_a') ? ' is-invalid' : ''), 'placeholder' => 'Entregado Material A']) }}
                    {!! $errors->first('entregado_material_a', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <!-- datos de precio -->
            <div class="col-sm">
                <div class="p-1 form-group">
                    {{ Form::label('costo_unitario') }}
                    {{ Form::number('costo_unitario', $finanza->costo_unitario, ['class' => 'form-control' . ($errors->has('costo_unitario') ? ' is-invalid' : ''), 'placeholder' => 'Costo Unitario']) }}
                    {!! $errors->first('costo_unitario', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('cantidad') }}
                    {{ Form::number('cantidad', $finanza->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('unidad') }}
                    {{ Form::select('unidad_id',$datosunidad, $finanza->unidad_id, ['class' => 'form-control' . ($errors->has('unidad_id') ? ' is-invalid' : ''), 'placeholder' => 'Unidad Id']) }}
                    {!! $errors->first('unidad_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('iva_id') }}
                    {{ Form::select('iva_id',$datosiva, $finanza->iva_id, ['class' => 'form-control' . ($errors->has('iva_id') ? ' is-invalid' : ''), 'placeholder' => 'Iva Id']) }}
                    {!! $errors->first('iva_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('monto_a_pagar') }}
                    {{ Form::number('monto_a_pagar', $finanza->monto_a_pagar, ['class' => 'form-control' . ($errors->has('monto_a_pagar') ? ' is-invalid' : ''), 'placeholder' => 'Monto A Pagar']) }}
                    {!! $errors->first('monto_a_pagar', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('fecha_de_pago') }}
                    {{ Form::date('fecha_de_pago', $finanza->fecha_de_pago, ['class' => 'form-control-sm' . ($errors->has('fecha_de_pago') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Pago']) }}
                    {!! $errors->first('fecha_de_pago', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    <?php $metodo = ['Efectivo', 'Cheque', 'Transferencia', 'Tarjeta de credito', 'Tarjetas digitales', 'Condonación', 'Cancelación']; ?>
                    {{ Form::label('metodo_de_pago') }}
                    {{ Form::select('metodo_de_pago', $metodo, $finanza->metodo_de_pago, ['class' => 'form-control' . ($errors->has('metodo_de_pago') ? ' is-invalid' : ''), 'placeholder' => 'Metodo De Pago']) }}
                    {!! $errors->first('metodo_de_pago', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group d-none">
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row justify-content-md-center">
                <button type="submit" class="btn btn-primary col col-lg-3">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endif