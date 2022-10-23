@extends('layouts.app')

@section('title','Categorías Familias')
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
                                {{ __('Categorias de Familias') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('categorias-familias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Categoría de Familias') }}
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
                                        
										<th>Familia Id</th>
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Es Activo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoriasFamilias as $categoriasFamilia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $categoriasFamilia->familia->nombre }}</td>
											<td>{{ $categoriasFamilia->nombre }}</td>
											<td>{{ $categoriasFamilia->descripcion }}</td>
											<td>{{ $categoriasFamilia->es_activo }}</td>

                                            <td>
                                                <form action="{{ route('categorias-familias.destroy',$categoriasFamilia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('categorias-familias.show',$categoriasFamilia->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('categorias-familias.edit',$categoriasFamilia->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $categoriasFamilias->links() !!}
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
                    "zeroRecords": "Nothing found - sorry",
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
    </script>
@endpush