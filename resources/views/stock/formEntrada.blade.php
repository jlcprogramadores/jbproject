    <div class="box box-info padding-1">
        <div class="box-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm p-2 form-group">
                        {{ Form::label('numero_factura') }}
                        {{ Form::text('numero_factura', $stock->numero_factura, ['class' => 'form-control' . ($errors->has('numero_factura') ? ' is-invalid' : ''), 'placeholder' => 'Numero Factura']) }}
                        {!! $errors->first('numero_factura', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-sm p-2 form-group">
                        {{ Form::label('proveedor') }}
                        <br>
                        {{ Form::select('proveedor_id', $proveedor,null, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''),'id'=>'proveedor_id','required', 'placeholder' => 'Selecciona Un Proveedor']) }}
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
                    <div class="form-group d-none">
                        <input type="text" name="es_entrada" value="1">
                    </div>
                <br>
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <div class="row">
                            <form>
                                <div class="col-sm p-2 form-group">
                                    {{ Form::label('producto') }}
                                    <br>
                                    {{ Form::select('producto_id', $producto,null, ['class' => 'form-control' . ($errors->has('producto_id') ? ' is-invalid' : ''),'id'=>'product-select']) }}
                                    {!! $errors->first('producto_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="col-sm p-2 form-group">
                                    {{ Form::label('cantidad') }}
                                    {{ Form::number('cantidad', $stock->cantidad?? 1, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''),'id'=>'quantity-input','min'=>'1', 'placeholder' => 'Cantidad']) }}
                                    {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="col-sm p-2 form-group">
                                    <label>Añade Productos</label>
                                    <button type="button" id="add-to-cart-btn" class="btn btn-primary form-control">Agregar</button>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <table class="table table-striped" id="cart-table">
                                <thead>
                                  <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>  
                    </div>
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
    @push('js')
        <script>
            $('#proveedor_id').select2();
            $('#product-select').select2();
            $(document).ready(function() {
                var cart = [];

                // Función para agregar un producto al carrito
                function addToCart(product) {
                    // Verificar si el producto ya está en el carrito
                    var productIndex = -1;
                    for (var i = 0; i < cart.length; i++) {
                    if (cart[i].id === product.id) {
                        productIndex = i;
                        break;
                    }
                    }

                    // Si el producto ya está en el carrito, actualizar su cantidad
                    if (productIndex >= 0) {
                        cart[productIndex].quantity += product.quantity;
                    } else {
                        cart.push(product);
                    }

                    // Actualizar la tabla del carrito
                    updateCartTable();
                }

                // Función para eliminar un producto del carrito
                function removeFromCart(productId) {
                    for (var i = 0; i < cart.length; i++) {
                        if (cart[i].id == productId) {
                            cart.splice(i, 1);
                            break;
                        }
                    }
                    // Actualizar la tabla del carrito
                    updateCartTable();
                }

                // Función para actualizar la tabla del carrito
                function updateCartTable() {
                    var tableBody = $('#cart-table tbody');
                    tableBody.empty();
                    var sinEstilo = 'border: none; background-color: transparent; pointer-events: none;';
                    for (var i = 0; i < cart.length; i++) {
                        var product = cart[i];
                        var row = $('<tr>');
                        row.append($('<td>').append('<input type="text" name="productos['+product.id+'][producto_id]" value="'+product.name+'" style="'+sinEstilo+'" readonly>'));
                        row.append($('<td>').append('<input type="number" name="productos['+product.id+'][cantidad]" value="'+product.quantity+'" style="'+sinEstilo+'" readonly>'));
                        row.append($('<td>').html('<button class="remove-from-cart-btn btn btn-danger" data-product-id="' + product.id + '">Eliminar</button>'));

                        tableBody.append(row);
                    }
                }

                // Manejar el evento de clic del botón "Agregar al carrito"
                $('#add-to-cart-btn').on('click', function() {
                    var selectedProduct = $('#product-select option:selected');
                    var productId = selectedProduct.val();
                    var productName = selectedProduct.text();
                    var productQuantity = parseInt($('#quantity-input').val()); // Obtener la cantidad del campo de entrada
                    
                    if(productQuantity < 1){
                        console.log('entre');
                        productQuantity = 1;
                    }
                    $('#quantity-input').val(1);
                    var product = {
                        id: productId,
                        name: productName,
                        quantity: productQuantity
                    };

                    addToCart(product);
                });

                // Manejar el evento de clic del botón "Eliminar" del carrito
                $('#cart-table').on('click', '.remove-from-cart-btn', function() {

                    var productId = $(this).data('product-id');
                    removeFromCart(productId);
                });
            });
        </script>
    @endpush