@extends('layouts.app')
@section('title','Paros')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@can('paros.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-white border-secondary">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Paros') }}
                            </span>
                            @can('paros.create')
                            <div class="float-right">
                                <a href="{{ route('paros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Paro') }}
                                </a>
                            </div>
                            @endcan
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
                                        
										<th>Nombre del Empleado</th>
										<th>Proyecto</th>
										<th>Puesto</th>
										<th>Salario</th>
										<th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Comentario</th>
										<th>Fecha Actualización</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paros as $paro)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $paro->empleado->nombre }}</td>
											<td>{{ $paro->proyecto->nombre}}</td>
											<td>{{ $paro->puesto->nombre }}</td>
											<td>{{ '$'. number_format($paro->salario,2)  }}</td>
                                            <td>{{ Carbon\Carbon::parse($paro->fecha_inicio)->format('Y-m-d')  }}</td>
                                            <td>{{ Carbon\Carbon::parse($paro->fecha_fin)->format('Y-m-d')  }}</td>
											<td>{{ $paro->comentario }}</td>
											<td>{{ $paro->usuario_edito }} <br/> {{ $paro->updated_at }}</td>

                                            <td>
                                                <form action="{{ route('paros.destroy',$paro->id) }}" method="POST">
                                                    @can('paros.show')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('paros.show',$paro->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    @endcan
                                                    @can('paros.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('paros.edit',$paro->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('paros.destroy')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $paros->links() !!}
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
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Nothing found - sorry",
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