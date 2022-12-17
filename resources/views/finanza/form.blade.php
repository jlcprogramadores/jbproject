@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="container">
        <!-- estilo a partir de balsmiq  -->
        <div class="row">
            @if (isset($finanza->entradas_id))
                <div class="col-sm p-1 form-group">
                    {{ Form::label('tipodeingreso_id','Tipo De Ingreso') }}
                    {{ Form::select('tipodeingreso_id',$datostipodeingreso,$entrada->tipodeingreso_id, ['class' => 'form-control' . ($errors->has('tipodeingreso_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Tipo de ingreso']) }}
                    {!! $errors->first('tipodeingreso_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            @endif
            <div class="col-sm p-1 form-group">
                {{ Form::label('proyecto_id','proyecto') }}
                {{ Form::select('proyecto_id',$datosproyecto, $finanza->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Proyecto']) }}
                {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <!-- para poder llenar categoria_id se requiere:
            selecionar una familia, para que cargen las categorias de dicha familia -->
            <div class="col-sm p-1 form-group">
                {{ Form::label('familia_id','familia') }}
                {{ Form::select('familia_id',$datosfamilia, null, ['class' => 'form-control' . ($errors->has('categorias_de_entrada_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Familia']) }}
                {!! $errors->first('categorias_de_entrada_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-sm p-1 form-group">
                {{ Form::label('categoria_id','Categoria') }}
                {{ Form::select('categoria_id',$datoscategoriasfamilia, $finanza->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Categoria']) }}
                {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
        <div class="row">
            <!-- datos de ingreso -->
            <div class="col-sm">
                @if (isset($finanza->entradas_id))
                    <div class="p-1 form-group">
                        {{ Form::label('cliente_id','cliente') }}
                        {{ Form::select('cliente_id',$datoscliente, $entrada->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Cliente']) }}
                        {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                @else
                    <div class="p-1 form-group">
                        {{ Form::label('proveedor_id','proveedor') }}
                        {{ Form::select('proveedor_id',$datosproveedor, $salida->proveedor_id, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Proveedor']) }}
                        {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                @endif
                <div class="p-1 form-group">
                    {{ Form::label('folio') }}
                    {{ Form::text('no', $finanza->no, ['class' => 'form-control' . ($errors->has('no') ? ' is-invalid' : ''), 'placeholder' => 'Folio']) }}
                    {!! $errors->first('no', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <?php 
                    $fechaEntrada = isset($finanza->fecha_entrada) ? $fechaCreacion = Carbon\Carbon::parse($finanza->fecha_entrada)->format('Y-m-d') : $finanza->fecha_entrada;
                ?>
                <div class="p-1 form-group">
                    {{ Form::label('fecha_entrada') }}
                    {{ Form::date('fecha_entrada', $fechaEntrada, ['class' => 'form-control-sm' . ($errors->has('fecha_entrada') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Entrada']) }}
                    {!! $errors->first('fecha_entrada', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                @if (isset($finanza->entradas_id))
                <?php 
                    $fechaFacturacion = isset($finanza->fecha_facturacion) ? $fechaCreacion = Carbon\Carbon::parse($finanza->fecha_facturacion)->format('Y-m-d') : $finanza->fecha_facturacion;
                ?>
                    <div class="p-1 form-group">
                        {{ Form::label('fecha_facturacion') }}
                        {{ Form::date('fecha_facturacion', $fechaFacturacion, ['class' => 'form-control-sm' . ($errors->has('fecha_facturacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Facturacion']) }}
                        {!! $errors->first('fecha_facturacion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                @else
                <?php 
                    $fechaSalida = isset($finanza->fecha_salida) ? $fechaCreacion = Carbon\Carbon::parse($finanza->fecha_salida)->format('Y-m-d') : $finanza->fecha_salida;
                ?>
                    <div class="p-1 form-group">
                        {{ Form::label('fecha_salida') }}
                        {{ Form::date('fecha_salida', $fechaSalida, ['class' => 'form-control-sm' . ($errors->has('fecha_salida') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Creacion']) }}
                        {!! $errors->first('fecha_salida', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                @endif
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
                <!-- falta quitarlo -->
                @if (isset($finanza->entradas_id))
                    <div class="p-1 form-group">
                        {{ Form::label('categorias_de_entrada_id', 'Categoria De Entrada') }}
                        {{ Form::select('categorias_de_entrada_id',$datoscategoriasdeentrada, $entrada->categorias_de_entrada_id, ['class' => 'form-control' . ($errors->has('categorias_de_entrada_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Categoria de entrada']) }}
                        {!! $errors->first('categorias_de_entrada_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div> 
                @endif
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
                    {{ Form::number('costo_unitario', $finanza->costo_unitario, ['class' => 'form-control', 'id'=>'costoUnitario', 'onchange'=>"obtenCostoUnitario(this.value);" ,'step'=>'any' . ($errors->has('costo_unitario') ? ' is-invalid' : ''), 'placeholder' => 'Costo unitario']) }}
                    {!! $errors->first('costo_unitario', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class=" col-sm p-1 form-group">
                    {{ Form::label('cantidad') }}
                    {{ Form::number('cantidad', $finanza->cantidad, ['class' => 'form-control', 'id' => 'cantidad' , 'onchange' => "obtenCantidad(this.value)", 'step'=>'any' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad ']) }}
                    {!! $errors->first('cantidad', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('unidad_id','Unidad') }}
                    {{ Form::select('unidad_id',$datosunidad, $finanza->unidad_id, ['class' => 'form-control' . ($errors->has('unidad_id') ? ' is-invalid' : ''), 'placeholder' => 'Unidad Id']) }}
                    {!! $errors->first('unidad_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('iva_id','IVA') }}
                    {{ Form::select('iva_id',$datosiva, $finanza->iva_id, ['class' => 'form-control', 'id'=>'selectIva', 'onchange'=>"obtenIva(this.value);" . ($errors->has('iva_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona IVA']) }}
                    {!! $errors->first('iva_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('Sub-Total')}} 
                    <br>
                    <input type="number" class='form-control' readonly='true' id="sub-total" placeholder ='Sub-total' name="sub-total" onchange="obtenSubTotal(this.value)">
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('Total') }}
                    {{ Form::number('monto_a_pagar', $finanza->monto_a_pagar, ['class' => 'form-control' , 'id'=>'total', 'readonly' => 'true','step'=>'any' . ($errors->has('monto_a_pagar') ? ' is-invalid' : ''), 'placeholder' => 'Monto a pagar']) }}
                    {!! $errors->first('monto_a_pagar', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <?php 
                    $fechaDePago = isset($finanza->fecha_de_pago) ? $fechaCreacion = Carbon\Carbon::parse($finanza->fecha_de_pago)->format('Y-m-d') : $finanza->fecha_de_pago;
                ?>
                <div class="p-1 form-group">
                    {{ Form::label('fecha_de_pago') }}
                    {{ Form::date('fecha_de_pago', $fechaDePago, ['class' => 'form-control-sm' . ($errors->has('fecha_de_pago') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Pago']) }}
                    {!! $errors->first('fecha_de_pago', '<div class="invalid-feedback">:message</div>') !!}
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
                    {{ Form::label('Método de Pago') }}
                    {{ Form::select('metodo_de_pago', $metodo, $finanza->metodo_de_pago, ['class' => 'form-control' . ($errors->has('metodo_de_pago') ? ' is-invalid' : ''), 'placeholder' => 'Metodo De Pago']) }}
                    {!! $errors->first('metodo_de_pago', '<div class="invalid-feedback">:message</div>') !!}
                </div>
   
                {{ Form::label('Comprobante de pago') }}
                <p>
                    <label for="comprobante"></label>
                    <input type="file" name="comprobante">
                </p>
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
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#proveedor_id').select2();
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

        let costoUnitarioAux = "0";
        let cantidadAux = "0";
        let subTotalAux = "0";
        let ivaAux = "0";
        
        function obtenCostoUnitario(val) {
            costoUnitarioAux = val;

            var cantidad = document.getElementById('cantidad');
            var subtotal = document.getElementById('sub-total');
            
            subtotal.value = costoUnitarioAux * cantidad.value;
            
            var ivaAux = $( "#selectIva option:selected" ).text();
            var subTotal = costoUnitarioAux * cantidad.value;
            
            var total = document.getElementById('total');
            total.value = subTotal * ivaAux;
        }
        
        function obtenCantidad(val) {
            cantidadAux = val;
            
            var costoUnitario = document.getElementById('costoUnitario');
            var subtotal = document.getElementById('sub-total');
            
            subtotal.value = cantidadAux * costoUnitario.value;
            
            var ivaAux = $( "#selectIva option:selected" ).text();
            var subTotal = cantidadAux * costoUnitario.value;
            
            var total = document.getElementById('total');
            total.value = subTotal * ivaAux;
        }

        function obtenSubTotal(val) {
            // console.log('soy subtotal ' + val);
        }

        function obtenIva(val) {
            var ivaAux = $( "#selectIva option:selected" ).text();
            var cantidad = document.getElementById('cantidad');
            var costoUnitario = document.getElementById('costoUnitario');
            var subtotal = document.getElementById('sub-total');
            
            subtotal.value = cantidad.value * costoUnitario.value;

            var subTotal = cantidad.value * costoUnitario.value;
            
            var total = document.getElementById('total');
            total.value = subTotal * ivaAux;
        }
        
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