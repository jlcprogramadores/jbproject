@extends('layouts.app')
@section('title','Datos Filtrados')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-white border-secondary">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Datos Filtrados') }}
                            </span>

                             <div class="float-right">
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped display compact" id="table"  style="width:100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Fecha Entrada</th>
										<th>Fecha Salida</th>
                                        <th>Vence</th>
                                        <th>Fecha vencimiento</th>
                                        <th>Días</th>
                                        <th>Estado</th>
										<th>Tipo E&S</th>    
                                        <th>Fam & Cat</th>
                                        <th>Razon social</th>
                                        <th>Proyecto</th>
										<th>Descripcion</th>
                                        <th>Factaura o Folio</th>
                                        <th>Proveedor o usuario</th>
										<th>C.U. & Unidad</th>
										<th>Costo Unitario</th>
                                        <th>Subtotal Total MXN</th>
										<th>Iva</th>
                                        <th>Total $MXN$</th>
										<th>Monto A Pagar</th>
										<th>Fecha De Pago</th>
										<th>Metodo De Pago</th>
                                        <th>$ Estatus $</th>
										<th>Entregado Material A</th>
                                        <th>Fecha Facturacion</th>
										<th>Comentario</th>
                                        <th>Comprobante</th>
                                        <th>Fecha Actualización</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($finanzas as $finanza)
                                        <tr>

                                            <td>{{ $finanza->no }}</td>
											<td>{{ Carbon\Carbon::parse($finanza->fecha_entrada)->format('Y-m-d') }}</td>
											<td>{{ Carbon\Carbon::parse($finanza->fecha_salida)->format('Y-m-d') }}</td>
                                            <td>{{ $finanza->vence }}</td>
											<td>{{ $dias = Carbon\Carbon::parse( strtotime($finanza->fecha_salida."+ ".$finanza->vence." days"))->format('Y-m-d') }}</td>
                                            <?php 
                                                $fechaActual = Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                                                $shippingDate = Carbon\Carbon::createFromFormat('Y-m-d', $dias);
                                                $diferencia_en_dias = $fechaActual->diffInDays($shippingDate);
                                            ?>
                                            <td>{{ $diferencia_en_dias }}</td>
                                            @if ($diferencia_en_dias <= 0)
                                                <td><p class="badge bg-danger">Vencido</p></td>
                                            @else
                                                <td><p class="badge bg-warning text-dark">Por vencer</p></td>
                                            @endif
                                            <?php $tipoFinanza = $finanza->salidas_id ?  'Salida' : 'Entrada' ?>
											<td>{{ $tipoFinanza }}</td>
                                            <?php 
                                                $fam = 'F: '.$finanza->famCategoria->familia->nombre;
                                                $cat = 'C: '.$finanza->famCategoria->nombre;
                                            ?>
											<td> <span style=" white-space: nowrap">{{ $fam }}</span> <br/> <span style=" white-space: nowrap">{{ $cat }}</span>    </td>
                                            <td>{{ $finanza->salidas_id ? $finanza->salida->proveedore->razon_social : $finanza->entrada->cliente->razon_social }}</td>
                                            <td>{{ $finanza->proyecto->nombre }}</td>
											<td>{{ $finanza->descripcion }}</td>
                                            <td>
                                                @foreach($finanza->factura as $iterFactura)
                                                <?php   
                                                $factura = "";
                                                $factura .= $iterFactura->referencia_factura ? $iterFactura->referencia_factura : '';
                                                $factura .= "/";
                                                ?>
                                                {{$factura}}
                                                @endforeach
                                            </td>
                                            <td>{{$finanza->salidas_id ? $finanza->salida->proveedore->nombre : $finanza->entrada->cliente->nombre}}</td>
											<td>{{ $finanza->costo_unitario.' '.$finanza->unidad->nombre }}</td>
											<td>{{ $finanza->cantidad }}</td>
                                            <td>{{ $subTotal = $finanza->costo_unitario*$finanza->cantidad }}</td>
											<td>{{ $iva = $finanza->iva->porcentaje/100 }}</td>
                                            <td>{{ '$'.$subTotal*$iva }}</td>
											<td>{{ $montoAPagar = $finanza->monto_a_pagar }}</td>
											<td >{{ $finanza->fecha_de_pago }}</td>
											<td>{{ $finanza->metodo_de_pago }}</td>
                                            @if ($montoAPagar>0)
                                                <td><p class="badge bg-success">Pagado</p></td>
                                            @else
                                                <td><p class="badge bg-danger">Pendiente Pagar</p></td>
                                            @endif
											<td>{{ $finanza->entregado_material_a }}</td>
                                            <td>{{ $finanza->fecha_facturacion }}</td>
                                            <td>{{ $finanza->comentario }}</td>
                                            @if ($finanza->salidas_id)
                                                @if ($finanza->salida->enviado == 0)
                                                    <td><p class="badge bg-danger">Sin Enviar</p></td>
                                                @else
                                                    <td><p class="badge bg-success">Enviado</p></td>
                                                @endif
                                            @else
                                                <td></td>
                                            @endif
                                            <td><span class="peque">{{ $finanza->usuario_edito }}</span>  <br/> <span class="peque">{{ $finanza->updated_at }}</span></td>
                                            <td>
                                                <span class="completo">
                                                    <form action="{{ route('finanzas.destroy',$finanza->id) }}" method="POST">
                                                        @if ($finanza->salidas_id)
                                                            <a class="btn btn-sm btn-secondary " href="{{ route('finanzas.correo',$finanza->id) }}"><i class="fa fa-fw fa-eye"></i> Correo</a>      
                                                        @endif
                                                        
                                                        <a class="btn btn-sm btn-warning" href="{{ route('facturas.facturafinanzas', ['id' => $finanza->id]) }}"><i class="fa fa-fw fa-edit"></i> Factura</a>
                                                        
                                                        <a class="btn btn-sm btn-primary " href="{{ route('finanzas.show',$finanza->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('finanzas.edit',$finanza->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                    </form>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $finanzas->links() !!}
            </div>
        </div>
    </div>
@endsection
@endif
@push('scripts')
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/fixedheader/3.3.1/js/dataTables.fixedHeader.min.js"></script>
    <!-- Para usar los botones -->
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>


    <!-- Para los estilos en Excel     -->
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table thead tr').clone(true).addClass('filters').appendTo( '#table thead' );
            $('#table').DataTable({
                responsive:true,
                autoWidth: false,   
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontró nada – lo siento",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function() {
                    var api = this.api();
                    // For each column
                    api.columns().eq(0).each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                        var title = $(cell).text();
                        $(cell).html( '<input type="text" placeholder="'+title+'" />' );
                        // On every keypress in this input
                        $('input', $('.filters th').eq($(api.column(colIdx).header()).index()) )
                            .off('keyup change')
                            .on('keyup change', function (e) {
                                e.stopPropagation();
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();
                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search((this.value != "") ? regexr.replace('{search}', '((('+this.value+')))') : "", this.value != "", this.value == "")
                                    .draw();
                                $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
                },
                dom: "Bfrtip",
                buttons:{
                    dom: {
                        button: {
                            className: 'btn'
                        }
                    },
                    buttons: [
                        {
                            extend: "excel",
                            text:'Exportar a Excel',
                            className:'btn btn-outline-success',
                        }
                    ]            
                }

            });
        });
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'advertencia',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, bórralo!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // si se cumple el formulario lanza el swal
                    if (form.submit()) {
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Su registro ha sido eliminado.',
                        showConfirmButton: false,
                        timer: 1500
                        })    
                    }
                }
            })
        });
    </script>
@endpush
