@extends('layouts.app')
@section('title','Finanzas')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
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
                                <a href="{{ route('finanzas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Finanza') }}
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
                                        
										<th>Salidas Id</th>
										<th>Entradas Id</th>
                                        <th>Vence</th>
										<th>Categoria Id</th>
                                        <th>Proyecto Id</th>
										<th>Iva Id</th>
										<th>No</th>
										<th>Fecha Creacion</th>
										<th>Fecha Entrada</th>
										<th>Descripcion</th>
										<th>Cantidad</th>
										<th>Unidad Id</th>
										<th>Costo Unitario</th>
										<th>Retencion</th>
										<th>Monto A Pagar</th>
										<th>Fecha De Pago</th>
										<th>Metodo De Pago</th>
										<th>Entregado Material A</th>
										<th>Comentario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($finanzas as $finanza)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $finanza->salidas_id }}</td>
											<td>{{ $finanza->entradas_id }}</td>
                                            <td>{{ $finanza->vence }}</td>
											<td>{{ $finanza->categoria_id }}</td>
                                            <td>{{ $finanza->proyecto_id }}</td>
											<td>{{ $finanza->iva_id }}</td>
											<td>{{ $finanza->no }}</td>
											<td>{{ $finanza->fecha_salida }}</td>
											<td>{{ $finanza->fecha_entrada }}</td>
											<td>{{ $finanza->descripcion }}</td>
											<td>{{ $finanza->cantidad }}</td>
											<td>{{ $finanza->unidad_id }}</td>
											<td>{{ $finanza->costo_unitario }}</td>
											<td>{{ $finanza->retencion }}</td>
											<td>{{ $finanza->monto_a_pagar }}</td>
											<td>{{ $finanza->fecha_de_pago }}</td>
											<td>{{ $finanza->metodo_de_pago }}</td>
											<td>{{ $finanza->entregado_material_a }}</td>
											<td>{{ $finanza->comentario }}</td>

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
@push('scripts')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
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