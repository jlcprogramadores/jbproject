@extends('adminlte::page')
@section('title','Categorías De Familias')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categorías De Familias') }}
                            </span>
                            @can('categorias-familias.acciones')
                                <div class="float-right">
                                    <a href="{{ route('categorias-familias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                        {{ __('Crear Categoría De Familia') }}
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
                                        
										<th>Familia</th>
										<th>Nombre</th>
										<th>Descripción</th>
                                        <th>Actualización</th>
                                        @can('categorias-familias.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoriasFamilias as $categoriasFamilia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $categoriasFamilia->familia->nombre }}</td>
											<td>{{ $categoriasFamilia->nombre }}</td>
											<td>{{ $categoriasFamilia->descripcion }}</td>
                                            <td><span class="peque">{{ $categoriasFamilia->usuario_edito }}</span>  <br/> <span class="peque">{{ $categoriasFamilia->updated_at }}</span></td>
                                            @can('categorias-familias.acciones')
                                                <td>
                                                    <form action="{{ route('categorias-familias.destroy',$categoriasFamilia->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('categorias-familias.show',$categoriasFamilia->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('categorias-familias.edit',$categoriasFamilia->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                    </form>
                                                </td>
                                            @endcan
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