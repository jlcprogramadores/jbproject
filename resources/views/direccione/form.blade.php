<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('tipo_de_direccione_id', 'Tipo De Direcciones') }}
            {{ Form::select('tipo_de_direccione_id',$tipodedireccione, $direccione->tipo_de_direccione_id, ['class' => 'form-control' . ($errors->has('tipo_de_direccione_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona tipo']) }}
            {!! $errors->first('tipo_de_direccione_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <?php 
                // si esta vacio significa que no se reciobio nada en la request
                if(request()->tipo != ''){
                    // si crea una nueva direccion desde un proveedor o un cliente se asignas sus id desde el inicio
                    // place holder se deja en null para que se seleccione la primera opcion en select
                    if(request()->tipo == 'cliente'){
                        $nombre = 'cliente';
                        $nombreForm = 'cliente_id';
                        $placeholder = null;
                        $select2 = [request()->id => request()->nombre];
                        $direcciones = $direccione->cliente_id;
                    }elseif(request()->tipo == 'proveedor'){
                        $nombre = 'proveedor';
                        $nombreForm = 'proveedor_id';
                        $placeholder = null;
                        $select2 = [request()->id => request()->nombre];
                        $direcciones = $direccione->proveedor_id;
                    }
                }else{
                    // Estas opciones estan acuvoas para cuando se edite el formulario
                    // Consiste en mestar corresponditne mente si se edita desde provedores o desde clientes
                    if(isset($direccione->cliente_id)){
                        $nombre = 'cliente';
                        $nombreForm = 'cliente_id';
                        $placeholder = null;
                        $select2 = $cliente;
                        $direcciones = $direccione->cliente_id;
                    }else{
                        $nombre = 'proveedor';
                        $nombreForm = 'proveedor_id';
                        $placeholder = null;
                        $select2 = $proveedores;
                        $direcciones = $direccione->proveedor_id;
                    }
                }
            ?>
            {{ Form::label($nombreForm,$nombre) }}
            {{ Form::select($nombreForm ,$select2, $direcciones, ['class' => 'form-control' . ($errors->has('$nombreForm') ? ' is-invalid' : ''), 'placeholder' => $placeholder]) }}
            {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('calle') }}
            {{ Form::text('calle', $direccione->calle, ['class' => 'form-control' . ($errors->has('calle') ? ' is-invalid' : ''), 'placeholder' => 'Calle']) }}
            {!! $errors->first('calle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('num_int') }}
            {{ Form::number('num_int', $direccione->num_int, ['class' => 'form-control' . ($errors->has('num_int') ? ' is-invalid' : ''), 'placeholder' => 'Num Int']) }}
            {!! $errors->first('num_int', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('num_ext') }}
            {{ Form::number('num_ext', $direccione->num_ext, ['class' => 'form-control' . ($errors->has('num_ext') ? ' is-invalid' : ''), 'placeholder' => 'Num Ext']) }}
            {!! $errors->first('num_ext', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('codigo_postal') }}
            {{ Form::number('codigo_postal', $direccione->codigo_postal, ['class' => 'form-control' . ($errors->has('codigo_postal') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Postal']) }}
            {!! $errors->first('codigo_postal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('colonia') }}
            {{ Form::text('colonia', $direccione->colonia, ['class' => 'form-control' . ($errors->has('colonia') ? ' is-invalid' : ''), 'placeholder' => 'Colonia']) }}
            {!! $errors->first('colonia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('municipio') }}
            {{ Form::text('municipio', $direccione->municipio, ['class' => 'form-control' . ($errors->has('municipio') ? ' is-invalid' : ''), 'placeholder' => 'Municipio']) }}
            {!! $errors->first('municipio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <?php 
            $estados = [ 
            'Aguascalientes' => 'Aguascalientes',
            'Baja California' => 'Baja California',
            'Baja California Sur' => 'Baja California Sur',
            'Campeche' => 'Campeche',
            'Chiapas' => 'Chiapas',
            'Chihuahua' => 'Chihuahua',
            'Coahuila'  => 'Coahuila' ,
            'Colima' => 'Colima',
            'Distrito Federal' => 'Distrito Federal',
            'Durango' => 'Durango',
            'Guanajuato' => 'Guanajuato',
            'Guerrero' => 'Guerrero',
            'Hidalgo' => 'Hidalgo',
            'Jalisco' => 'Jalisco',
            'M??xico' => 'M??xico',
            'Michoac??n' => 'Michoac??n',
            'Morelos' => 'Morelos',
            'Nayarit' => 'Nayarit',
            'Nuevo Le??n' => 'Nuevo Le??n',
            'Oaxaca' => 'Oaxaca',
            'Puebla' => 'Puebla',
            'Quer??taro' => 'Quer??taro',
            'Quintana Roo' => 'Quintana Roo',
            'San Luis Potos??' => 'San Luis Potos??',
            'Sinaloa' => 'Sinaloa',
            'Sonora' => 'Sonora',
            'Tabasco' => 'Tabasco',
            'Tamaulipas' => 'Tamaulipas',
            'Tlaxcala' => 'Tlaxcala',
            'Veracruz' => 'Veracruz',
            'Yucat??n' => 'Yucat??n',
            'Zacatecas' => 'Zacatecas'];
        ?>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::select('estado', $estados,null ,['class' => 'form-select'. ($errors->has('estado') ? ' is-invalid' : '')]) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('pais') }}
            {{ Form::text('pais', "Mexico", ['class' => 'form-control' . ($errors->has('pais') ? ' is-invalid' : '')]) }}
            {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
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
        <br>
    </div>
    <div class="box-footer mt20">
        <a href="javascript:history.back()" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary">Aceptar</button>
    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#estado').select2();
        $('#cliente_id').select2();
        $('#proveedor_id').select2();
        $('#tipo_de_direccione_id').select2();
    </script>
@endpush
