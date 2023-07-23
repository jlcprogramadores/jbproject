<div class="box box-info padding-1">
    <div class="container">
        <div class="form-group d-none">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">Campo requerido *</div>') !!}
        </div>
        <div class="row">
            <div class=" col alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Nota:</strong> Según el numero de meses, se crearan las facturas correspondientes; Y estas se acceden en Finanzas/General.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        </div>
        <div class="row">
            
            @if ($finanza->a_meses)
                <div class="col form-group">
                    <label>A Meses</label>
                    <span style="color:red">*</span>
                    <input type="number" value="{{$finanza->a_meses}}" class="form-control" disabled>
                </div>
            @else
                <div class="col form-group">
                    {{ Form::label('a_meses') }}
                    <span style="color:red">*</span>
                    {{ Form::number('a_meses', $finanza->a_meses, ['class' => 'form-control' . ($errors->has('a_meses') ? ' is-invalid' : ''), 'placeholder' => 'A cuantos meses']) }}
                    {!! $errors->first('a_meses', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
            @endif
            <div class="col form-group">
                {{ Form::label('fecha_primer_pago') }}
                <span style="color:red">*</span>
                {{ Form::date('fecha_primer_pago', $finanza->fecha_primer_pago, ['class' => 'form-control'. ($errors->has('fecha_primer_pago') ? ' is-invalid' : '')]) }}
                {!! $errors->first('fecha_primer_pago', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
        </div>

        <div class="row">
            <div class="col form-group">
                {{ Form::label('fecha_entrada') }}
                <span style="color:red">*</span>
                {{ Form::date('fecha_entrada', $finanza->fecha_entrada, ['class' => 'form-control' . ($errors->has('fecha_entrada') ? ' is-invalid' : ''), 'onchange' => "obtenVence()", 'placeholder' => 'Fecha Entrada','required']) }}
                {!! $errors->first('fecha_entrada', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
            <div class="col form-group">
                {{ Form::label('vence') }}
                <span style="color:red">*</span>
                {{ Form::number('vence', $finanza->vence, ['class' => 'form-control' . ($errors->has('vence') ? ' is-invalid' : ''), 'onchange' => "obtenVence()", 'placeholder' => 'En cuantos días vence','required']) }}
                {!! $errors->first('vence', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                {{ Form::label('fecha_salida') }}
                {{ Form::date('fecha_salida', $finanza->fecha_salida, ['class' => 'form-control'. ($errors->has('fecha_salida') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Creacion','readonly']) }}
                {!! $errors->first('fecha_salida', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                {{ Form::label('familia_id','Familia') }}
                <span style="color:red">*</span>
                {{ Form::select('familia_id',$datosfamilia, null, ['class' => 'form-control' . ($errors->has('familia_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una opción','required']) }}
                {!! $errors->first('familia_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
            <div class="col form-group">
                {{ Form::label('categoria_id','Categoría') }}
                <span style="color:red">*</span>
                {{ Form::select('categoria_id',$datoscategoriasfamilia, $finanza->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una opción','required']) }}
                {!! $errors->first('categoria_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                {{ Form::label('proyecto_id','Proyecto') }}
                <span style="color:red">*</span>
                {{ Form::select('proyecto_id',$datosproyecto, $finanza->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una opción','required']) }}
                {!! $errors->first('proyecto_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
            <div class="col form-group">
                {{ Form::label('descripción') }}
                <span style="color:red">*</span>
                {{ Form::text('descripcion', $finanza->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion','required']) }}
                {!! $errors->first('descripcion', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                {{ Form::label('proveedor_id','Proveedor') }}
                <span style="color:red">*</span>
                {{ Form::select('proveedor_id',$datosproveedor, $salida->proveedor_id, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una opción','required']) }}
                {!! $errors->first('proveedor_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-3 form-group">
                {{ Form::label('cantidad') }}
                <span style="color:red">*</span>
                {{ Form::number('cantidad', $finanza->cantidad, ['class' => 'form-control'  . ($errors->has('cantidad') ? ' is-invalid' : ''), 'onchange' => "obtenTotal();", 'step'=>'any', 'placeholder' => 'Cantidad ','required']) }}
                {!! $errors->first('cantidad', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
            <div class="col-3 form-group">
                {{ Form::label('unidad_id','Unidad') }}
                <span style="color:red">*</span>
                {{ Form::select('unidad_id',$datosunidad, $finanza->unidad_id, ['class' => 'form-control' . ($errors->has('unidad_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una opción','required']) }}
                {!! $errors->first('unidad_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
            <div class="col form-group">
                {{ Form::label('costo_unitario') }}
                <span style="color:red">*</span>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    {{ Form::number('costo_unitario', $finanza->costo_unitario, ['class' => 'form-control'.($errors->has('costo_unitario') ? ' is-invalid' : ''), 'onchange'=>"obtenTotal();" ,'step'=>'any' , 'placeholder' => 'Costo unitario','required']) }}
                    {!! $errors->first('costo_unitario', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 form-group">
                {{ Form::label('sub_total','Subtotal')}} 
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    {{ Form::number('sub_total', $finanza->costo_unitario, ['class' => 'form-control', 'step'=>'any' . ($errors->has('costo_unitario') ? ' is-invalid' : ''),'readonly'=>'true','onchange'=>"obtenSubTotal(this.value)" , 'placeholder' => 'Subtotal']) }}
                    {!! $errors->first('sub_total', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
            </div>
            <div class="col-3 form-group">
                {{ Form::label('iva_id','IVA') }}
                <span style="color:red">*</span>
                {{ Form::select('iva_id',$datosiva, $finanza->iva_id??3, ['class' => 'form-control'. ($errors->has('iva_id') ? ' is-invalid' : ''), 'onchange'=>"obtenTotal();" , 'placeholder' => 'Selecciona una opción','required']) }}
                {!! $errors->first('iva_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
            
            <div class="col form-group">
                {{ Form::label('Total') }}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    {{ Form::number('monto_a_pagar', $finanza->monto_a_pagar, ['class' => 'form-control' , 'id'=>'total', 'readonly' => 'true','step'=>'any' . ($errors->has('monto_a_pagar') ? ' is-invalid' : ''), 'placeholder' => 'Monto a pagar']) }}
                    {!! $errors->first('monto_a_pagar', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                {{ Form::label('fecha_de_pago') }}
                {{ Form::date('fecha_de_pago', $finanza->fecha_de_pago, ['class' => 'form-control' . ($errors->has('fecha_de_pago') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Pago']) }}
                {!! $errors->first('fecha_de_pago', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
            <div class="col form-group">
                <?php 
                    $metodo = [
                        'EFECTIVO' => 'EFECTIVO',
                        'CHEQUE' => 'CHEQUE',
                        'TRANSFERENCIA' => 'TRANSFERENCIA',
                        'TARJETA DE DEBITO' => 'TARJETA DE DEBITO',
                        'TARJETA DE CREDITO' => 'TARJETA DE CREDITO',
                        'TARJETAS DIGITALES' => 'TARJETAS DIGITALES',
                        'CONDONACION' => 'CONDONACION',
                        'CANCELADA' => 'CANCELADA',
                        '?' => '?'
                    ];
                ?>
                {{ Form::label('metodo_de_pago','Método De Pago') }}
                {{ Form::select('metodo_de_pago', $metodo, $finanza->metodo_de_pago, ['class' => 'form-control' . ($errors->has('metodo_de_pago') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una opción']) }}
                {!! $errors->first('metodo_de_pago', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                {{ Form::label('entregado_material_a','Entregado Material A:') }}
                <span style="color:red">*</span>
                {{ Form::text('entregado_material_a', $finanza->entregado_material_a, ['class' => 'form-control' . ($errors->has('entregado_material_a') ? ' is-invalid' : ''), 'placeholder' => 'Quién recibe el material','required']) }}
                {!! $errors->first('entregado_material_a', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
            <div class="col form-group">
                <label for="comprobante" id="textComprobante">Comprobante De Pago</label>
                <input type="file" name="comprobante" id="comprobante"  class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col form-group">
                {{ Form::label('comentario') }}
                {{ Form::text('comentario', $finanza->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
                {!! $errors->first('comentario', '<div class="invalid-feedback">Campo requerido *</div>') !!}
            </div>
        </div>
        <br>
        <div class="row d-flex justify-content-center">
            <a href="{{ route('finanzas.index') }}" class="btn btn-danger col col-2">{{ __('Cancelar')}}</a>    
            <div class="col col-2"></div>
            <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-2">Aceptar</button>
        </div>
    </div>
</div>
@push('js')
    
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
        
        function obtenVence() {
            let fechaSalida = document.getElementById('fecha_salida');
            let fechaEntrada = document.getElementById('fecha_entrada');
            let vence = document.getElementById('vence');

            let result = new Date(fechaEntrada.value??0);
            let diasSumados = Number(vence.value);

            result.setDate(result.getDate() + (diasSumados)+1);   
            
            let ano = (result.getFullYear());
            let mes = ((result.getMonth()+1));
            let dia = (result.getDate());
            
            if (mes < 10) {
                mes = '0'+ mes
            }

            if (dia < 10) {
                dia = '0'+ dia
            }
            cadFechaSalida = ano + '-' + mes + '-'  + dia;
            fechaSalida.value = cadFechaSalida;
        }
        
        async function obtenTotal() {
            let input_cantidad = document.getElementById('cantidad');
            let input_costo_unitario = document.getElementById('costo_unitario');
            let input_subtotal = document.getElementById('sub_total');
            var input_total = document.getElementById('total');
            let input_iva = $( "#iva_id" );
            let cantidad;
            let costo_unitario; 
            let subtotal;
            let total;

            if (input_cantidad.value === null || typeof input_cantidad.value === 'undefined' || input_cantidad.value === '') {
                cantidad = 1;
            }else{
                cantidad = input_cantidad.value;
            }
            if (input_costo_unitario.value === null || typeof input_costo_unitario.value === 'undefined' || input_costo_unitario.value === '') {
                costo_unitario = 1;
            }else{
                costo_unitario = input_costo_unitario.value;
            }
            subtotal = cantidad * costo_unitario;
            input_subtotal.value = subtotal;
            let valor_iva = await getIVA(input_iva.val());
            total = subtotal * valor_iva['porcentaje']; 
            if (!isNaN(total)) {
                input_total.value = total.toFixed(2);
            }
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

        async function getIVA(id) {
            try {
                const response = await $.ajax({
                    type: "GET",
                    url: "/getIVA?id=" + id,
                });
                const respuesta = JSON.parse(response);
                return respuesta;
            } catch (error) {
                return null;
            }
        }
        
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append(
                '<tr>'+
                    '<td><input type="text" name="factura['+i+'][referencia_factura]" class="form-control" placeholder="Referencia" required/></td>'+
                     '<td><input type="text" name="factura['+i+'][concepto]" class="form-control" placeholder="concepto" required/></td>'+
                     '<td><input type="text" name="factura['+i+'][url]" class="form-control" placeholder="URL"/></td>'+
                     '<td><input type="file" name="factura['+i+'][factura_base64]"  class="form-control"/></td>'+
                     '<td><input type="date" name="factura['+i+'][fecha_factura]" class="form-control" required/></td>'+
                     '<td><input type="number" step="any" name="factura['+i+'][monto]" class="form-control" placeholder="Monto" required/></td>'+
                     '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td>'+
                '</tr>'
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

        function mostrarDiv() {
            var apartadoFactura = document.getElementById('apartadoFactura');
            if (apartadoFactura.style.display === "none") {
                apartadoFactura.style.display = "block";
                document.getElementById('referencia_factura').required = true;
                document.getElementById('concepto').required = true;
                document.getElementById('fecha_factura').required = true;
                document.getElementById('monto').required = true;
            } else {
                apartadoFactura.style.display = "none";
                document.getElementById('referencia_factura').required = false;
                document.getElementById('concepto').required = false;
                document.getElementById('fecha_factura').required = false;
                document.getElementById('monto').required = false;
            }
        }
    </script>
@endpush