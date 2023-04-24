@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">

            <div class="container">
                <div class="row">
                    <?php 
                        // si esta vacio significa que no se reciobio nada en la request
                        if(request()->tipo != ''){
                            // si crea una nueva direccion desde un proveedor o un cliente se asignas sus id desde el inicio
                            // place holder se deja en null para que se seleccione la primera opcion en select
                            if(request()->tipo == 'cliente'){
                                $nombre = 'Cliente';
                                $nombreForm = 'cliente_id';
                                $placeholder = null;
                                $select2 = [request()->id => request()->nombre];
                                $telefonos = $telefono->cliente_id;
                            }elseif(request()->tipo == 'proveedor'){
                                $nombre = 'Proveedor';
                                $nombreForm = 'proveedor_id';
                                $placeholder = null;
                                $select2 = [request()->id => request()->nombre];
                                $telefonos = $telefono->proveedor_id;
                            }
                        }else{
                            // Estas opciones estan acuvoas para cuando se edite el formulario
                            // Consiste en mestar corresponditne mente si se edita desde provedores o desde clientes
                            if(isset($telefono->cliente_id)){
                                $nombre = 'Cliente';
                                $nombreForm = 'cliente_id';
                                $placeholder = null;
                                $select2 = $cliente;
                                $telefonos = $telefono->cliente_id;
                            }else{
                                $nombre = 'Proveedor';
                                $nombreForm = 'proveedor_id';
                                $placeholder = null;
                                $select2 = $proveedore;
                                $telefonos = $telefono->proveedor_id;
                            }
                        }
                    ?>
                    {{ Form::label($nombreForm, $nombre) }}
                    {{ Form::select($nombreForm ,$select2, $telefonos, ['class' => 'form-control' . ($errors->has('$nombreForm') ? ' is-invalid' : ''), 'placeholder' => $placeholder]) }}
                    {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('teléfono') }}
                    {{ Form::number('telefono', $telefono->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Descripción') }}
                    {{ Form::text('descripcion', $telefono->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group d-none">
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
			<br>
            <div class="row d-flex justify-content-center">
                <a href="javascript:history.back()" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#proveedor_id').select2();
        $('#cliente_id').select2();
    </script>
@endpush
@endif