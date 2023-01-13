@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
                <div class="form-group d-none">
                    <?php 
                        $idFinanza = "";
                        if(request()->creado == 1){
                            $idFinanza = [request()->finanza_id => 'finanza'];
                        }else{
                            $idFinanza = $datofinanza;
                        }
                    ?>
                    {{ Form::label('finanza_id') }}
                    {{ Form::select('finanza_id',$idFinanza ,$factura->finanza_id, ['class' => 'form-control' . ($errors->has('finanza_id') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('finanza_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            <div class="row">
                <div class="col-sm p-1 form-group">
                    {{ Form::label('referencia_factura') }}
                    {{ Form::text('referencia_factura', $factura->referencia_factura, ['class' => 'form-control' . ($errors->has('referencia_factura') ? ' is-invalid' : ''), 'placeholder' => 'Referencia Factura']) }}
                    {!! $errors->first('referencia_factura', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm p-1 form-group">
                    {{ Form::label('concepto') }}
                    {{ Form::text('concepto', $factura->concepto, ['class' => 'form-control' . ($errors->has('concepto') ? ' is-invalid' : ''), 'placeholder' => 'Concepto']) }}
                    {!! $errors->first('concepto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm p-1 form-group">
                    <label for="factura_base64">Comprobante de factura</label>
                    <input type="file" name="factura_base64" class="form-control">
                </div>
                <div class="col-sm p-1 form-group">
                    {{ Form::label('url') }}
                    {{ Form::text('url', $factura->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Url']) }}
                    {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm p-1 form-group">
                    <?php // si tenia auna fecha guardada la recupera
                        if(isset($factura->fecha_creacion)){
                            $fechaCreacion = Carbon\Carbon::parse($factura->fecha_creacion)->format('Y-m-d');
                        }else{
                            $now = new DateTime();
                            $fechaCreacion = $now->format('Y-m-d');
                        }
                    ?>
                    {{ Form::label('fecha_creacion') }}
                    <br>
                    {{ Form::date('fecha_creacion', $fechaCreacion, ['class' => 'form-control', 'readonly' => 'true' . ($errors->has('fecha_creacion') ? ' is-invalid' : ''),'value' => date("m-d-Y")]) }}
                    {!! $errors->first('fecha_creacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm p-1 form-group">
                    <?php // si tenia auna fecha guardada la recupera
                        if(isset($factura->fecha_factura)){
                            $fechaFactura = Carbon\Carbon::parse($factura->fecha_factura)->format('Y-m-d');
                        }else{
                            $fechaFactura = $factura->fecha_factura;
                        }
                    ?>
                    {{ Form::label('Fecha Facturación') }}
                    <br>
                    {{ Form::date('fecha_factura', $fechaFactura, ['class' => 'form-control' . ($errors->has('fecha_factura') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Factura']) }}
                    {!! $errors->first('fecha_factura', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm p-1 form-group">
                    {{ Form::label('monto') }}
                    {{ Form::number('monto', $factura->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto', 'step'=>'any']) }}
                    {!! $errors->first('monto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
                <div class="col-sm p-1 form-group d-none">
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            <br>
            <div class="row">
                <div class="row justify-content-md-center">
                    <br>
                    <a href="javascript:history.back()" class="btn btn-danger col col-lg-3">{{ __('Cancelar')}}</a>
                    <br>
                    <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-lg-3">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif