@extends('layouts.app')
@section('title','Clientes')
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
                                {{ __('Clientes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Cliente') }}
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
										<th>Razon Social</th>
										<th>Mail</th>
										<th>Rfc</th>
                                        <th>Direccion</th>
                                        <th>Teléfono</th>
                                        <th>Actualización</th>
                                        <th>Datos</th>    
                                        <th>Acciones</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cliente->nombre }}</td>
											<td>{{ $cliente->razon_social }}</td>
											<td>{{ $cliente->mail }}</td>
											<td>{{ $cliente->rfc }}</td>
											<td>@foreach($cliente->direcciones as $iterDireccion)
                                                <?php
                                                // iteramos y formamos las las dirreciones s
                                                $direccion = "";
                                                $direccion .= $iterDireccion->calle ? 'Calle: ' . $iterDireccion->calle : '';
                                                $direccion .= $iterDireccion->num_ext ? ' Num ext: ' . $iterDireccion->num_ext : '';
                                                $direccion .= $iterDireccion->num_int ? ' Num int: ' . $iterDireccion->num_int : '';
                                                $direccion .= $iterDireccion->colonia ? ' Col: ' . $iterDireccion->colonia : '';
                                                $direccion .= $iterDireccion->codigo_postal ? ' CP: ' . $iterDireccion->codigo_postal : '';
                                                $direccion .= $iterDireccion->municipio ? ' Municipio: ' . $iterDireccion->municipio : '';
                                                $direccion .= $iterDireccion->estado ? ' Estado: ' . $iterDireccion->estado : '';
                                                $direccion .= ",";
                                                ?>
                                                {{$direccion}}
                                                @endforeach
                                            </td>
                                            
                                            <td>
                                                <?php $itel=0; ?>
                                                @foreach($cliente->telefonos as $iterTelefono)
                                                <?php   
                                                ++$itel; 
                                                // iteramos y formamos las las dirreciones s
                                                $telefono = "";
                                                $telefono .= $iterTelefono->telefono ? 'Tel' . $itel . ': ' . $iterTelefono->telefono : '';
                                                $telefono .= ",";
                                                ?>
                                                {{$telefono}}
                                                @endforeach
                                            </td>
                                            <td>{{ $cliente->usuario_edito }}  <br/> {{ $cliente->updated_at }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" href="{{ route('direcciones.direccioncliente', ['id' => $cliente->id]) }}"><i class="fa fa-fw fa-edit"></i> Dirección</a>
                                                <a class="btn btn-sm btn-warning" href="{{ route('telefonos.telefonocliente', ['id' => $cliente->id]) }}"><i class="fa fa-fw fa-edit"></i> Teléfono</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('clientes.show',$cliente->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('clientes.edit',$cliente->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $clientes->links() !!}
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
                },
                columnDefs: [{
                    // espeificamos que columna sera afectada
                    targets: [5,6],
                    render: function(data, type, full, meta) {    
                        return '<div class="truncate">' + data.split(",").join("<br/>") + '</div>';
                    }
                }]
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