@extends('layouts.app')
@section('title','Finanzas')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@can('finanzas.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-white border-secondary">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ 'Top '.$nombre }}
                            </span>
                              <div class="float-right">
                                <a href="javascript:history.back()" class="btn btn-light btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
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
                                        <th>Razón social</th>
                                        <th>Proyecto</th>
										<th>Descripción</th>
                                        <th>Factura o Folio</th>
                                        <th>Proveedor o cliente</th>
										<th>Cantidad & Unidad</th>
										<th>Costo Unitario</th>
                                        <th>Subtotal Total MXN</th>
										<th>Iva</th>
                                        <th>Total $MXN$</th>
										<th>Monto A Pagar</th>
										<th>Fecha De Pago</th>
										<th>Metodo De Pago</th>
                                        <th>$ Estatus $</th>
										<th>Entregado Material A</th>
										<th>A Meses</th>
                                        <th>Fecha Facturacion</th>
										<th>Comentario</th>
                                        <th>Comprobante</th>
                                        <th>Fecha Actualización</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($finanzas as $finanza)
                                        <tr>

                                            <td>{{ $finanza->no }}</td>
											<td>
                                                @if ($finanza->esta_atrasado)
                                                    <span class="text-danger">
                                                        {{ $finanza->fecha_entrada ? Carbon\Carbon::parse($finanza->fecha_entrada)->format('Y-m-d') : '' }}
                                                    </span>
                                                    <br>
                                                    <span class="peque text-danger">
                                                        Atrasada
                                                    </span>
                                                @else
                                                    {{ $finanza->fecha_entrada ? Carbon\Carbon::parse($finanza->fecha_entrada)->format('Y-m-d') : '' }}
                                                    
                                                @endif
                                            
                                            </td>
											<td>{{ $finanza->fecha_salida ? Carbon\Carbon::parse($finanza->fecha_salida)->format('Y-m-d') : '' }}</td>
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
                                                @if (!empty($finanza->factura[0]))
                                                 @foreach($finanza->factura as $iterFactura)
                                                    {{$iterFactura->referencia_factura}}
                                                    /
                                                        
                                                    @endforeach
                                                @else
                                                    <p class="badge bg-danger">No facturado</p>
                                                @endif

                                            </td>
                                            <td>{{$finanza->salidas_id ? $finanza->salida->proveedore->nombre : $finanza->entrada->cliente->nombre}}</td>
											<td>{{ $finanza->cantidad.' '.$finanza->unidad->nombre }}</td>
											<td>{{ '$'. number_format($finanza->costo_unitario,2) }}</td>
                                            <td>{{  '$'. number_format($subTotal = $finanza->costo_unitario*$finanza->cantidad,2) }}</td>
											<td>{{ ($iva = $finanza->iva->porcentaje).'%' }}</td>
                                            <td>{{ '$'. number_format($subTotal*$iva,2) }}</td>
											<td>{{ '$'. number_format($montoAPagar = $finanza->monto_a_pagar,2) }}</td>
											<td >{{$finanza->fecha_de_pago ? Carbon\Carbon::parse($finanza->fecha_de_pago)->format('Y-m-d') : ''}}</td>
											<td>{{ $finanza->metodo_de_pago }}</td>
                                            @if ($finanza->es_pagado == 0)
                                                <td><p class="badge bg-danger">Pendiente Pagar</p></td>
                                            @else
                                                <td><p class="badge bg-success">Pagado</p></td>
                                            @endif
											<td>{{ $finanza->entregado_material_a }}</td>
                                            {{-- Parte de los meses --}}
                                            {{-- motrar cuantos se han pagado y motrar el valor menos el total --}}
                                            <td>
                                                @if (!empty($finanza->a_meses))
                                                    <?php 
                                                        $cuantosMeses = 0;
                                                        $totalPagado = 0;
                                                        if(!empty($finanza->factura[0])){
                                                            foreach ($finanza->factura as $iterFactura) {
                                                                if (!is_null($iterFactura->monto) && $iterFactura->monto != 0  ) {
                                                                    $cuantosMeses++;
                                                                    $totalPagado = $totalPagado + $iterFactura->monto; 
                                                                }
                                                            }
                                                        }
                                                        $resta = $finanza->monto_a_pagar - $totalPagado
                                                        
                                                    ?> 
                                                    {{ $cuantosMeses.' de '.$finanza->a_meses}}
                                                    <br>
                                                    <span class="peque">
                                                        @if ($resta <= 0)
                                                            Pagado
                                                        @else
                                                            {{ 'Resta: $'. number_format($resta,2)  }}
                                                        @endif
                                                    </span>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $finanza->fecha_facturacion ?  Carbon\Carbon::parse($finanza->fecha_facturacion)->format('Y-m-d') :'' }}</td>
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
@endcan
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
                order: [
                    [18, 'desc']
                ],
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
                columnDefs: [{
                    // espeificamos que columna sera afectada
                    targets: [12],
                    render: function(data, type, full, meta) {    
                        return '<div class="truncate">' + data.split(",").join("<br/>") + '</div>';
                    }
                }],
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
                dom: 'Blfrtip',
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
