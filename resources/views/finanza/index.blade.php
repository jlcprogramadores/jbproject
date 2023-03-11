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
                                {{ __('Finanzas') }}
                            </span>

                             <div class="float-right">
                                @can('finanzas.create')
                                <a href="{{ route('finanzas.egresoMeses') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Egresos A Meses') }}
                                </a> 
                                <a href="{{ route('finanzas.egreso') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Egresos') }}
                                </a> 
                                <a href="{{ route('finanzas.ingreso') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Ingresos') }}
                                </a>
                                @endcan
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
                            <table class="table table-striped display compact" id= "table" style="width:100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Fecha Entrada</th>
										<th>Fecha Salida</th>
                                        <th>Vence</th>
                                        <th>Fecha vencimiento</th>
                                        <th>Días</th>
                                        <th>Estado</th>
										<th>Tipo I&E</th>    
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
                                        {{-- <th>Acciones</th> --}}
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
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
                "processing": true,
                "serverSide": true,
                "paging": true,
                "pageLength": 10,
                "ordering": false,
                
                "columns":[
                    {data: 'no'},
                    {data: 'fecha_entrada'},
                    {data: 'fecha_salida'},
                    {data: 'vence'},
                    {data: 'fecha_vencimiento'},
                    {data: 'dias'},
                    {data: 'estado'},
                    {data: 'tipo_i&e'},
                    {data: 'fam_&_cat'},
                    {data: 'razon_social'},
                    {data: 'proyecto'},
                    {data: 'descripción'},
                    {data: 'factura_o_folio'},
                    {data: 'proveedor_o_cliente'},
                    {data: 'cantidad_&_unidad'},
                    {data: 'costo_unitario'},
                    {data: 'subtotal_total_mxn'},
                    {data: 'iva'},
                    {data: 'total_mxn'},
                    {data: 'monto_a_pagar'},
                    {data: 'fecha_de_pago'},
                    {data: 'metodo_de_pago'},
                    {data: 'estatus'},
                    {data: 'entregado_material_a'},
                    {data: 'a_meses'},
                    {data: 'fecha_facturacion'},
                    {data: 'comentario'},
                    {data: 'comprobante'},
                    {data: 'fecha_actualizacion'},
                    
                ],
                "ajax":"{{ route('finanzas.datos') }}",
                // "lengthChange": false,
                // paging: false,
                responsive:true,
                autoWidth: false,
                order: [
                    [0, 'desc']
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
                // columnDefs: [{
                //     // espeificamos que columna sera afectada
                //     targets: [12, 24],
                //     render: function(data, type, full, meta) {    
                //         return '<div class="truncate">' + data + '</div>';
                //     }
                // }],
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
