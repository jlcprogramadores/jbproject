@extends('layouts.app')
@section('title','Finanzas')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@if(\Auth::check())
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-white border-secondary">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Finanzas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('finanzas.egreso') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Egresos') }}
                                </a> 
                                <a href="{{ route('finanzas.ingreso') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Ingresos') }}
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
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Fecha Entrada</th>
										<th>Fecha Salida</th>
                                        <th>Vence</th>
                                        <th>Fecha vencimineto</th>
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
										<th>Ret 6%</th>
                                        <th>Total $MXN$</th>
										<th>Monto A Pagar</th>
										<th>Fecha De Pago</th>
										<th>Metodo De Pago</th>
                                        <th>$ Estatus $</th>
										<th>Entregado Material A</th>

                                        <th>Fecha Facturacion</th>
										<th>Comentario</th>
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
                                            <td>{{$diferencia_en_dias <= 0 ? 'Vencido' : 'Por vencer' }}</td>
                                            <?php $tipoFinanza = $finanza->salidas_id ?  'Salida' : 'Entrada' ?>
											<td>{{ $tipoFinanza }}</td>
                                            <?php 
                                                $famCat = 'F: '.$finanza->famCategoria->familia->nombre.',';
                                                $famCat .= 'C: '.$finanza->famCategoria->nombre;
                                            ?>
											<td>{{ $famCat }}</td>
                                            <td>{{ $finanza->salidas_id ? $finanza->salida->proveedore->razon_social : $finanza->entrada->cliente->razon_social }}</td>
                                            <td>{{ $finanza->proyecto->nombre }}</td>
											<td>{{ $finanza->descripcion }}</td>
                                            <td>factura_id</td>
                                            <td>{{$finanza->salidas_id ? $finanza->salida->proveedore->nombre : $finanza->entrada->cliente->nombre}}</td>
											<td>{{ $finanza->costo_unitario.' '.$finanza->unidad->nombre }}</td>
											<td>{{ $finanza->cantidad }}</td>
                                            <td>{{ $subTotal = $finanza->costo_unitario*$finanza->cantidad }}</td>
											<td>{{ $iva = $finanza->iva->porcentaje/100 }}</td>
                                            <td>{{ '$'.$subTotal*$iva }}</td>
											<td>{{ $montoAPagar = $finanza->monto_a_pagar }}</td>
											<td>{{ $finanza->fecha_de_pago }}</td>
											<td>{{ $finanza->metodo_de_pago }}</td>
                                            <td>{{ $montoAPagar>0 ? 'Pagado' : 'Pendiente Pagar' }}</td>
											<td>{{ $finanza->entregado_material_a }}</td>

                                            <td>{{ $finanza->fecha_facturacion }}</td>
											<td>{{ $finanza->comentario }}</td>
                                            <td>{{ $finanza->usuario_edito }}  <br/> {{ $finanza->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('finanzas.destroy',$finanza->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('finanzas.show',$finanza->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('finanzas.edit',$finanza->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
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
    <script>
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
                columnDefs: [{
                    // espeificamos que columna sera afectada
                    targets: [8],
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
