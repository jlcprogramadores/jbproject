@extends('layouts.app')

@section('template_title')
    Categorias De Entrada
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categorias De Entrada') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('categorias-de-entradas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Es Activo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoriasDeEntradas as $categoriasDeEntrada)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $categoriasDeEntrada->nombre }}</td>
											<td>{{ $categoriasDeEntrada->descripcion }}</td>
											<td>{{ $categoriasDeEntrada->es_activo }}</td>

                                            <td>
                                                <form action="{{ route('categorias-de-entradas.destroy',$categoriasDeEntrada->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('categorias-de-entradas.show',$categoriasDeEntrada->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('categorias-de-entradas.edit',$categoriasDeEntrada->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
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
