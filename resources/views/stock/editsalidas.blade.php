@extends('layouts.app')

@section('title','Editar Salida')
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Salida</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('stocks.update', $stock->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="container">
                                        {{-- <div class="row">
                                            <div class="form-group">
                                                {{ Form::label('numero_factura') }}
                                                {{ Form::text('numero_factura', $stock->numero_factura, ['class' => 'form-control' . ($errors->has('numero_factura') ? ' is-invalid' : ''), 'placeholder' => 'Numero Factura']) }}
                                                {!! $errors->first('numero_factura', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-sm p-2 form-group">
                                                {{ Form::label('proveedor') }}
                                                <br>
                                                {{ Form::select('proveedor_id', $proveedor,null, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''),'id'=>'proveedor_id','required']) }}
                                                {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                            <div class="col-sm p-2 form-group">
                                                <?php 
                                                    $fechaEntrada = isset($stock->fecha) ? $fechaCreacion = Carbon\Carbon::parse($stock->fecha)->format('Y-m-d') : $stock->fecha;
                                                ?>
                                                {{ Form::label('fecha') }}
                                                {{ Form::date('fecha', $fechaEntrada, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
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
                                        {{-- CANTIDAD Y PRODUCTO --}}
                                        <div class="row">
                                            <div class="col-sm p-2 form-group">
                                                {{ Form::label('producto') }}
                                                {{ Form::select('producto_id', $producto,null, ['class' => 'form-control' . ($errors->has('producto_id') ? ' is-invalid' : ''),'id'=>'product-select']) }}
                                                {!! $errors->first('producto_id', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                            <div class="col-sm p-2 form-group">
                                                {{ Form::label('cantidad') }}
                                                {{ Form::number('cantidad', $stock->cantidad?? 1, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''),'id'=>'quantity-input','min'=>'1', 'placeholder' => 'Cantidad']) }}
                                                {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                            <div class="form-group d-none">
                                                {{ Form::label('usuario_edito') }}
                                                {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
                                                {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                            <div class="form-group d-none">
                                                <input type="text" name="es_entrada" value="1">
                                            </div>
                                        <br>
                                        <div class="row d-flex justify-content-center">
                                            <a href="{{ route('stocks.entradas') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                                            <div class="col col-sm-2"></div>
                                            <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif
