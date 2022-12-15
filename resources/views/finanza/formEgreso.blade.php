@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="container">
        <!-- estilo a partir de balsmiq  -->
        <div class="row">
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
                    {{ Form::label('proveedor_id','Proveedor') }}
                    {{ Form::select('proveedor_id',$datosproveedor, $salida->proveedor_id, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el proveedor']) }}
                    {!! $errors->first('proveedor_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('no', 'No.') }}
                    {{ Form::text('no', $finanza->no, ['class' => 'form-control' . ($errors->has('no') ? ' is-invalid' : ''), 'placeholder' => 'No']) }}
                    {!! $errors->first('no', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('fecha_entrada') }}
                    {{ Form::date('fecha_entrada', $finanza->fecha_entrada, ['class' => 'form-control-sm' . ($errors->has('fecha_entrada') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Entrada']) }}
                    {!! $errors->first('fecha_entrada', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <!-- ocupa el campo de fecha facturacion no de salida -->
                <div class="p-1 form-group">
                    {{ Form::label('fecha_salida') }}
                    {{ Form::date('fecha_salida', $finanza->fecha_salida, ['class' => 'form-control-sm' . ($errors->has('fecha_salida') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Creacion']) }}
                    {!! $errors->first('fecha_salida', '<div class="invalid-feedback">Campo requerido *</div>') !!}
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
                    {{ Form::label('comentario') }}
                    {{ Form::text('comentario', $finanza->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
                    {!! $errors->first('comentario', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('entregado_material_a') }}
                    {{ Form::text('entregado_material_a', $finanza->entregado_material_a, ['class' => 'form-control' . ($errors->has('entregado_material_a') ? ' is-invalid' : ''), 'placeholder' => 'Quién recibe el material']) }}
                    {!! $errors->first('entregado_material_a', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
            </div>
            <!-- datos de precio -->
            <div class="col-sm">
                <div class="row">
                    <div class="col-sm p-1 form-group">
                        {{ Form::label('cantidad') }}
                        {{ Form::number('cantidad', $finanza->cantidad, ['class' => 'form-control', 'onchange' => "obtenCantidad(this.value)", 'step'=>'any' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                        {!! $errors->first('cantidad', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                    </div>
                    <div class="col-sm p-1 form-group">
                        {{ Form::label('unidad_id','Unidad') }}
                        {{ Form::select('unidad_id',$datosunidad, $finanza->unidad_id, ['class' => 'form-control' . ($errors->has('unidad_id') ? ' is-invalid' : ''), 'placeholder' => 'selecciona la unidad']) }}
                        {!! $errors->first('unidad_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                    </div>
                </div>
                <div class="p-1 form-group">
                    {{ Form::label('costo_unitario') }}
                    {{ Form::number('costo_unitario', $finanza->costo_unitario, ['class' => 'form-control','onchange'=>"obtenCostoUnitario(this.value);" ,'step'=>'any' . ($errors->has('costo_unitario') ? ' is-invalid' : ''), 'placeholder' => 'Costo unitario']) }}
                    {!! $errors->first('costo_unitario', '<div class="invalid-feedback">Campo requerido *</div>') !!}
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
                    {{ Form::number('monto_a_pagar', $finanza->monto_a_pagar, ['class' => 'form-control', 'id'=>'total', 'readonly' => 'true','step'=>'any' . ($errors->has('monto_a_pagar') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
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
                <div class="p-1 form-group  d-flex flex-column">
                        <label for="comprobante" id="textComprobante">Comprobante de pago</label>
                        <input type="file" name="comprobante" id="comprobante">
                </div>
                <div class="form-group d-none">
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
                <table class="table table-bordered" id="dynamicAddRemove">
                    <tr>
                        <th>Cantidad</th>
                        <th>Acción</th>
                    </tr>
                    <tr>
                        <td><input type="number" name="cantidad[0][cantidad]" placeholder="Cantidad" class="form-control"/>
                        </td>
                        <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Añadir</button></td>
                    </tr>
                </table>
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
        $('#proyecto_id').select2();
        $('#categoria_id').select2();
        $('#proveedor_id').select2();
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
            var subtotal = document.getElementById('sub-total');
            subtotal.value = costoUnitarioAux * cantidadAux;
            
            var ivaAux = $( "#selectIva option:selected" ).text();
            var subTotal = costoUnitarioAux * cantidadAux;
            var total = document.getElementById('total');

            total.value = subTotal * ivaAux;
        }
        function obtenCantidad(val) {
            cantidadAux = val;
            var subtotal = document.getElementById('sub-total');
            subtotal.value = costoUnitarioAux * cantidadAux;

            var ivaAux = $( "#selectIva option:selected" ).text();
            var subTotal = costoUnitarioAux * cantidadAux;
            var total = document.getElementById('total');

            total.value = subTotal * ivaAux;
        }

        function obtenSubTotal(val) {
            // console.log('soy subtotal ' + val);
        }

        function obtenIva(val) {
            var ivaAux = $( "#selectIva option:selected" ).text();
            var subTotal = costoUnitarioAux * cantidadAux;
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

        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="cantidad[' + i +
                '][cantidad]" placeholder="Cantidad" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
            if(i != 0){
                comprobante = document.getElementById('comprobante');
                comprobante.value = null;
                comprobante.style.display = 'none';
                comprobante = document.getElementById('textComprobante');
                comprobante.value = null;
                comprobante.style.display = 'none';   
            }

        });
        $(document).on('click', '.remove-input-field', function () {
            --i;
            $(this).parents('tr').remove();
            if(i == 0){
                comprobante = document.getElementById('comprobante');
                comprobante.style.display = 'block';
                comprobante = document.getElementById('textComprobante');
                comprobante.style.display = 'block';
            }
        });
    </script>
@endpush