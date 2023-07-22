@extends('adminlte::page')
@section('title','Categorías De Entradas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categorías De Entradas') }}
                            </span>

                             <div class="float-right">
                                @can('categorias-de-entradas.acciones')          
                                    <a href="{{ route('categorias-de-entradas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                        {{ __('Crear Categoría De Entrada') }}
                                    </a>
                                @endcan
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($message = Session::get('danger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Descripción</th>
                                        <th>Actualización</th>
                                        @can('categorias-de-entradas.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoriasDeEntradas as $categoriasDeEntrada)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $categoriasDeEntrada->nombre }}</td>
											<td>{{ $categoriasDeEntrada->descripcion }}</td>
                                            <td><span class="peque">{{ $categoriasDeEntrada->usuario_edito }}</span>  <br/> <span class="peque">{{ $categoriasDeEntrada->updated_at }}</span></td>
                                            @can('categorias-de-entradas.acciones')
                                                <td>
                                                    <form action="{{ route('categorias-de-entradas.destroy',$categoriasDeEntrada->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('categorias-de-entradas.show',$categoriasDeEntrada->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('categorias-de-entradas.edit',$categoriasDeEntrada->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i></button>
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
                {!! $categoriasDeEntradas->links() !!}
            </div>
        </div>
    </div>
@endsection