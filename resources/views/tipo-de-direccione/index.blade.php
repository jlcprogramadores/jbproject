@extends('layouts.app')
@section('title','Tipo De Direcciones')
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
                                {{ __('Tipo De Direcciones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tipo-de-direcciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Tipo De Dirección') }}
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
                                        
										<th>Nombre</th>
										<th>Es Fiscal</th>
                                        <th>Actualización</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipoDeDirecciones as $tipoDeDireccione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tipoDeDireccione->nombre }}</td>
											<td>{{ $tipoDeDireccione->es_fiscal }}</td>
                                            <td>{{ $tipoDeDireccione->usuario_edito }}  <br/> {{ $tipoDeDireccione->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('tipo-de-direcciones.destroy',$tipoDeDireccione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tipo-de-direcciones.show',$tipoDeDireccione->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tipo-de-direcciones.edit',$tipoDeDireccione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $tipoDeDirecciones->links() !!}
            </div>
        </div>
    </div>
@endsection
@endif
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