@extends('layouts.app')
@section('title','Control Gasolinera')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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
                                {{ __('Control Gasolinera') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('control-gasolineras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo Registro') }}
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
                                        
										<th>Gasolinera</th>
										<th>Destino</th>
										<th>Folio</th>
										<th>Ticket</th>
										<th>Producto</th>
										<th>Litros</th>
										<th>Precio Unitario</th>
										<th>Total</th>
										<th>Fecha</th>
										<th>Carga</th>
										<th>Comentario</th>
										<th>Folio Factura</th>
										<th>Total Factura Neto</th>
										<th>Pagado</th>
										<th>Vale Archivo</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($controlGasolineras as $controlGasolinera)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $controlGasolinera->gasolinera->nombre }}</td>
                                            <td>{{ $controlGasolinera->destino->nombre }}</td>
											<td>{{ $controlGasolinera->folio }}</td>
											<td>{{ $controlGasolinera->ticket }}</td>
											<td>{{ $controlGasolinera->producto }}</td>
											<td>{{ $controlGasolinera->litros }}</td>
                                            <td>{{ '$'. number_format($controlGasolinera->precio_unitario,2) }}</td>
                                            <td>{{ '$'. number_format($controlGasolinera->total,2) }}</td>
                                            <td >{{$controlGasolinera->fecha ? Carbon\Carbon::parse($controlGasolinera->fecha_de_pago)->format('Y-m-d') : ''}}</td>
											<td>{{ $controlGasolinera->carga }}</td>
											<td>{{ $controlGasolinera->comentario }}</td>
											<td>{{ $controlGasolinera->folio_factura }}</td>
                                            <td>{{ '$'. number_format($controlGasolinera->total_factura_neto,2) }}</td>
                                            @if ($controlGasolinera['es_pagado'])
                                                <td><p class="badge bg-success">Pagado</p></td>
                                            @else
                                                <td><p class="badge bg-danger">Sin Pagar</p></td>
                                            @endif
											{{-- <td>{{ $controlGasolinera->es_pagado }}</td> --}}
											<td>{{ $controlGasolinera->vale_archivo }}</td>

                                            <td>
                                                <form action="{{ route('control-gasolineras.destroy',$controlGasolinera->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('control-gasolineras.show',$controlGasolinera->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('control-gasolineras.edit',$controlGasolinera->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $controlGasolineras->links() !!}
            </div>
        </div>
    </div>
@endsection
@endif
@push('scripts')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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