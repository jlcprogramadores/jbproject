<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">

                <div class="col-sm-3 p-1 form-group">
                    {{ Form::label('gasolinera_id', 'Gasolinera') }}
                    <br>
                    {{ Form::select('gasolinera_id',$gasolinera ,$controlGasolinera->gasolinera_id, ['class' => 'form-control' . ($errors->has('gasolinera_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Gasolinera']) }}
                    {!! $errors->first('gasolinera_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm-3 p-1 form-group">
                    {{ Form::label('folio') }}
                    {{ Form::text('folio', $controlGasolinera->folio, ['class' => 'form-control' . ($errors->has('folio') ? ' is-invalid' : ''), 'placeholder' => 'Folio']) }}
                    {!! $errors->first('folio', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm-3 p-1 form-group">
                    {{ Form::label('ticket') }}
                    {{ Form::text('ticket', $controlGasolinera->ticket, ['class' => 'form-control' . ($errors->has('ticket') ? ' is-invalid' : ''), 'placeholder' => 'Ticket']) }}
                    {!! $errors->first('ticket', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm-3 p-1 form-group">
                    <?php 
                        $producto = [
                            'Diesel' => 'Diesel', 
                            'Magna' => 'Magna', 
                            'Premium' => 'Premium',
                        ];
                    ?>
                    {{ Form::label('producto') }}
                    {{ Form::select('producto', $producto,null ,['class' => 'form-select'. ($errors->has('producto') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('producto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="row">
                <div class=" col-sm-3 p-1 form-group">
                    {{ Form::label('litros') }}
                    {{ Form::number('litros', $controlGasolinera->litros, ['class' => 'form-control', 'id' => 'litros' , 'step'=>'any' . ($errors->has('litros') ? ' is-invalid' : ''), 'placeholder' => 'Litros ']) }}
                    {!! $errors->first('litros', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class=" col-sm-3 p-1 form-group">
                    {{ Form::label('precio_unitario') }}
                    {{ Form::number('precio_unitario', $controlGasolinera->precio_unitario, ['class' => 'form-control', 'id' => 'precio_unitario' , 'step'=>'any' . ($errors->has('precio_unitario') ? ' is-invalid' : ''), 'placeholder' => 'Precio Unitario']) }}
                    {!! $errors->first('precio_unitario', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class=" col-sm-3 p-1 form-group">
                    {{ Form::label('total') }}
                    {{ Form::number('total', $controlGasolinera->total, ['class' => 'form-control', 'id' => 'total' , 'step'=>'any' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total ']) }}
                    {!! $errors->first('total', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="col-sm-3 p-1 form-group">
                    <?php 
                        $fechaControl = isset($controlGasolinera->fecha) ? Carbon\Carbon::parse($controlGasolinera->fecha)->format('Y-m-d') : $controlGasolinera->fecha;
                    ?>
                    {{ Form::label('fecha') }}
                    {{ Form::date('fecha', $fechaControl, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Pago']) }}
                    {!! $errors->first('fecha', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
            </div>   
            
            <div class="row">
                <div class="col-sm-3 p-1 form-group">
                    {{ Form::label('carga') }}
                    {{ Form::text('carga', $controlGasolinera->carga, ['class' => 'form-control' . ($errors->has('carga') ? ' is-invalid' : ''), 'placeholder' => 'Carga']) }}
                    {!! $errors->first('carga', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm-3 p-1 form-group">
                    {{ Form::label('destino_id', 'Destino') }}
                    <br>
                    {{ Form::select('destino_id',$destino ,$controlGasolinera->destino_id, ['class' => 'form-control' . ($errors->has('destino_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Gasolinera']) }}
                    {!! $errors->first('destino_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm-3 p-1 form-group">
                    {{ Form::label('comentario') }}
                    {{ Form::text('comentario', $controlGasolinera->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
                    {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm-3 p-1 form-group">
                    {{ Form::label('folio_factura') }}
                    {{ Form::text('folio_factura', $controlGasolinera->folio_factura, ['class' => 'form-control' . ($errors->has('folio_factura') ? ' is-invalid' : ''), 'placeholder' => 'Folio Factura']) }}
                    {!! $errors->first('folio_factura', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <div class="row">
                <div class="col-sm-3 p-1 form-group">
                    {{ Form::label('total_factura_neto') }}
                    {{ Form::number('total_factura_neto', $controlGasolinera->total_factura_neto, ['class' => 'form-control', 'id' => 'total_factura_neto' , 'step'=>'any' . ($errors->has('total_factura_neto') ? ' is-invalid' : ''), 'placeholder' => 'Total Factura']) }}
                    {!! $errors->first('total_factura_neto', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="col-sm-3 p-1 form-group">
                    <?php 
                        $es_pagado = [
                            '1' => 'Pagado', 
                            '0' => 'Sin Pagar', 
                        ];
                    ?>
                    {{ Form::label('Esta Pagado') }}
                    {{ Form::select('es_pagado', $es_pagado,null ,['class' => 'form-select'. ($errors->has('es_pagado') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('es_pagado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm p-1 form-group">
                    {{ Form::label('Archivo del Vale') }}
                    <input type="file" name="vale_archivo" size="50" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-group d-none">
                {{ Form::label('usuario_edito') }}
                {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
                {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('control-gasolineras.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>
    </div>
</div>
