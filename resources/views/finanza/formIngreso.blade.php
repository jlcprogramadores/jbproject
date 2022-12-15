@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="container">
        <!-- estilo a partir de balsamiq  -->
        <div class="row">
            <div class="col-sm p-1 form-group">
                {{ Form::label('tipodeingreso_id','Tipo de ingreso') }}
                {{ Form::select('tipodeingreso_id',$datostipodeingreso,$entrada->tipodeingreso_id, ['class' => 'form-control' . ($errors->has('tipodeingreso_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona tipo de ingreso']) }}
                {!! $errors->first('tipodeingreso_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
            <div class="col-sm p-1 form-group">
                {{ Form::label('proyecto_id','Proyecto') }}
                {{ Form::select('proyecto_id',$datosproyecto, $finanza->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el proyecto']) }}
                {!! $errors->first('proyecto_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
            <!-- para poder llenar categoria_id se requiere:
            selecionar una familia, para que cargen las categorias de dicha familia -->
            <div class="col-sm p-1 form-group">
                {{ Form::label('familia_id','Familia') }}
                {{ Form::select('familia_id',$datosfamilia, null, ['class' => 'form-control' . ($errors->has('categorias_de_entrada_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona la familia']) }}
                {!! $errors->first('categorias_de_entrada_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
            <div class="col-sm p-1 form-group">
                {{ Form::label('categoria_id','Categoria') }}
                {{ Form::select('categoria_id',$datoscategoriasfamilia, $finanza->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona la categoria']) }}
                {!! $errors->first('categoria_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
        </div>
        <br>
        <div class="row">
            <!-- datos de ingreso -->
            <div class="col-sm">
                <div class="p-1 form-group">
                    {{ Form::label('cliente_id','Cliente') }}
                    {{ Form::select('cliente_id',$datoscliente, $entrada->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el cliente']) }}
                    {!! $errors->first('cliente_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('folio') }}
                    {{ Form::text('no', $finanza->no, ['class' => 'form-control' . ($errors->has('no') ? ' is-invalid' : ''), 'placeholder' => 'Folio']) }}
                    {!! $errors->first('no', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('fecha_entrada') }}
                    {{ Form::date('fecha_entrada', $finanza->fecha_entrada, ['class' => 'form-control-sm' . ($errors->has('fecha_entrada') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Entrada']) }}
                    {!! $errors->first('fecha_entrada', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('fecha_facturacion') }}
                    {{ Form::date('fecha_facturacion', $finanza->fecha_facturacion, ['class' => 'form-control-sm' . ($errors->has('fecha_facturacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Facturacion']) }}
                    {!! $errors->first('fecha_facturacion', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('vence') }}
                    {{ Form::number('vence', $finanza->vence, ['class' => 'form-control' . ($errors->has('vence') ? ' is-invalid' : ''), 'placeholder' => 'En cuantos días vence']) }}
                    {!! $errors->first('vence', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('descripción') }}
                    {{ Form::text('descripcion', $finanza->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('categorias_de_entrada_id', 'Categoria De Entrada') }}
                    {{ Form::select('categorias_de_entrada_id',$datoscategoriasdeentrada, $entrada->categorias_de_entrada_id, ['class' => 'form-control' . ($errors->has('categorias_de_entrada_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona la categoría']) }}
                    {!! $errors->first('categorias_de_entrada_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div> 
                <div class="p-1 form-group">
                    {{ Form::label('comentario') }}
                    {{ Form::text('comentario', $finanza->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
                    {!! $errors->first('comentario', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group d-none">
                    {{ Form::label('entregado_material_a', 'Material entregado a') }}
                    {{ Form::text('entregado_material_a', 'N/A', ['class' => 'form-control' . ($errors->has('entregado_material_a') ? ' is-invalid' : ''), 'placeholder' => 'Quién recibe el material']) }}
                    {!! $errors->first('entregado_material_a', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
            </div>
            <!-- datos de precio -->
            <div class="col-sm">
                <div class="p-1 form-group">
                    {{ Form::label('costo_unitario') }}
                    {{ Form::number('costo_unitario', $finanza->costo_unitario, ['class' => 'form-control' ,'step'=>'any'. ($errors->has('costo_unitario') ? ' is-invalid' : ''), 'placeholder' => 'Costo unitario']) }}
                    {!! $errors->first('costo_unitario', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('cantidad') }}
                    {{ Form::number('cantidad', $finanza->cantidad, ['class' => 'form-control','step'=>'any' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('cantidad', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('unidad_id','Unidad') }}
                    {{ Form::select('unidad_id',$datosunidad, $finanza->unidad_id, ['class' => 'form-control' . ($errors->has('unidad_id') ? ' is-invalid' : ''), 'placeholder' => 'selecciona la unidad']) }}
                    {!! $errors->first('unidad_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('iva_id','IVA') }}
                    {{ Form::select('iva_id',$datosiva, $finanza->iva_id, ['class' => 'form-control' . ($errors->has('iva_id') ? ' is-invalid' : ''), 'placeholder' => 'Selacciona IVA']) }}
                    {!! $errors->first('iva_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('monto_a_pagar') }}
                    {{ Form::number('monto_a_pagar', $finanza->monto_a_pagar, ['class' => 'form-control' ,'step'=>'any' . ($errors->has('monto_a_pagar') ? ' is-invalid' : ''), 'placeholder' => 'Monto a pagar']) }}
                    {!! $errors->first('monto_a_pagar', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('fecha_de_pago') }}
                    {{ Form::date('fecha_de_pago', $finanza->fecha_de_pago, ['class' => 'form-control-sm' . ($errors->has('fecha_de_pago') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Pago']) }}
                    {!! $errors->first('fecha_de_pago', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    <?php 
                    $metodo = [
                    'Efectivo' => 'Efectivo',
                    'Cheque' => 'Cheque',
                    'Transferencia' => 'Transferencia',
                    'Tarjeta de débito' => 'Tarjeta de débito',
                    'Tarjeta de credito' => 'Tarjeta de credito',
                    'Tarjetas digitales' => 'Tarjetas digitales',
                    'Condonación' => 'Condonación',
                    'Cancelación' => 'Cancelación'
                    ];
                    ?>
                    {{ Form::label('metodo_de_pago','Método de pago') }}
                    {{ Form::select('metodo_de_pago', $metodo, $finanza->metodo_de_pago, ['class' => 'form-control' . ($errors->has('metodo_de_pago') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el método']) }}
                    {!! $errors->first('metodo_de_pago', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="form-group d-none">
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row justify-content-md-center">
                <br>
                <a href="{{ route('finanzas.index') }}" class="btn btn-danger col col-lg-3">{{ __('Cancelar')}}</a>
                <br>
                <button type="submit" class="btn btn-primary col col-lg-3">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endif

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#tipodeingreso_id').select2();
        $('#proyecto_id').select2();
        $('#categoria_id').select2();
        $('#cliente_id').select2();
        $('#categorias_de_entrada_id').select2();
        $('#unidad_id').select2();
        $('#iva_id').select2();
        $('#metodo_de_pago').select2();
        $('#familia_id').select2();
        $('#familia_id').on('select2:select', function (e) {
            var data = e.params.data;
            getCategoriByFamilia(data.id);           
        });
        function getCategoriByFamilia(id){
            var iterable='';
            $.ajax({
                type:"GET",
                async : false,
                data:{
                    'familia_id':id
                },
                url: "{{ route('categorias-familias.getCategoriByFamilia') }}",
                success:function(data){
                    iterable = JSON.parse(data);
                    return iterable;
                }
            });
            $('#categoria_id').empty();
            select = document.getElementById('categoria_id');
            for (let value of iterable) {
                var opt = document.createElement('option');
                opt.value=value['id'];
                opt.innerHTML=value['nombre'];
                select.appendChild(opt)
            };
        }
    </script>
@endpush