@extends('layouts.app')
@section('title','Centro de Costos')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@can('finanzas.centrodecostos')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-white border-secondary">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Centro de costos') }}
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
                    @if ($message = Session::get('danger'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Proyecto</th>
										<th>Presupuesto</th>
                                        <th>Margen</th>
                                        <th>Costo Actual</th>
                                        <th>Utilidad</th>
                                        <th>Factor de Utilidad</th>
                                        <th>L??mite</th>
                                    </tr>
                                </thead>
                                                                       
                                <tbody>
                                    @foreach ($finanzas as $finanza)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{$finanza['nombre']}}</td> 
                                        <td>${{number_format($finanza['presupuesto'],2)}}</td>    
                                        <td>${{number_format($finanza['margen'],2)}}</td> 
                                        <td>${{number_format($finanza['costo'],2)}}</td> 
                                        <td>${{number_format($finanza['utilidad'],2)}}</td> 
                                        @if (($finanza['utilidad']-$finanza['costo']) > 0)
                                            <td><p class="text-success">+ {{number_format($finanza['utilidad']-$finanza['costo'],2)}}</p></td>
                                        @else
                                            <td><p class="text-danger">{{number_format($finanza['utilidad']-$finanza['costo'],2)}}</p></td>
                                        @endif
                                        @if ($finanza['costo'] < $finanza['presupuesto'])
                                                <td><p class="badge bg-success">Debajo del presupuesto</p></td>
                                        @elseif ($finanza['costo'] < $finanza['margen'])
                                            <td><p class="badge bg-warning text-dark">Dentro del margen</p></td>
                                        @else
                                            <td><p class="badge bg-danger">Presupuesto excedido</p></td>
                                        @endif
                                    </tr>
                                    @endforeach   
                                </tbody>
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
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#table thead tr').clone(true).addClass('filters').appendTo( '#table thead' );
            $('#table').DataTable({
                responsive:true,
                autoWidth: false,   
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por p??gina",
                    "zeroRecords": "No se encontr?? nada ??? lo siento",
                    "info": "P??gina _PAGE_ de _PAGES_",
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
            title: '??Estas seguro?',
            text: "??No podr??s revertir esto!",
            icon: 'advertencia',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '??S??, b??rralo!',
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