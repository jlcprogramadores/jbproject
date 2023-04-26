@if (Auth::check() && Auth::user()->es_activo)
    <div class="box box-info padding-1">
        <div class="box-body">
            <div class="container">
                <div class="row">
                    {{-- <div class="form-group">
                        {{ Form::label('numero_factura') }}
                        {{ Form::text('numero_factura', $stock->numero_factura, ['class' => 'form-control' . ($errors->has('numero_factura') ? ' is-invalid' : ''), 'placeholder' => 'Numero Factura']) }}
                        {!! $errors->first('numero_factura', '<div class="invalid-feedback">:message</div>') !!}
                    </div> --}}
                    <div class="form-group">
                        {{ Form::label('numero_documento') }}
                        {{ Form::text('numero_documento', $stock->numero_documento, ['class' => 'form-control' . ($errors->has('numero_documento') ? ' is-invalid' : ''), 'placeholder' => 'Numero Documento']) }}
                        {!! $errors->first('numero_documento', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm p-2 form-group">
                        {{ Form::label('proveedor') }}
                        {{ Form::select('proveedor_id', $proveedor,null, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Un Proveedor']) }}
                        {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-sm p-2 form-group">
                        {{ Form::label('fecha') }}
                        {{ Form::date('fecha', $stock->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                        {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm p-2 form-group">
                        {{ Form::label('destino') }}
                        {{ Form::text('destino', $stock->destino, ['class' => 'form-control' . ($errors->has('destino') ? ' is-invalid' : ''), 'placeholder' => 'Destino']) }}
                        {!! $errors->first('destino', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-sm p-2 form-group">
                        {{ Form::label('lote') }}
                        {{ Form::text('lote', $stock->lote, ['class' => 'form-control' . ($errors->has('lote') ? ' is-invalid' : ''), 'placeholder' => 'Lote']) }}
                        {!! $errors->first('lote', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                    <div class="form-group d-none">
                        {{ Form::label('usuario_edito') }}
                        {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
                        {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                <br>
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <div class="form-group">
                            {{ Form::label('producto') }}
                            {{ Form::select('producto_id', $producto,null, ['class' => 'form-control' . ($errors->has('producto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona El Producto']) }}
                            {!! $errors->first('producto_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('cantidad') }}
                            {{ Form::number('cantidad', $stock->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''),'min'=>'1', 'placeholder' => 'Cantidad']) }}
                            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
                <br>
                <div class="row d-flex justify-content-center">
                    <a href="{{ route('stocks.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                    <div class="col col-sm-2"></div>
                    <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
@endif
