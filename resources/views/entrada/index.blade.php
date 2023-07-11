@extends('adminlte::page')
@section('title','Entradas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Entradas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('entradas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Entrada') }}
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
                                        
										<th>Cliente</th>
										<th>Tipo de ingreso</th>
										<th>Categorias De Entrada</th>
										<th>Proyecto</th>
                                        <th>Actualización</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entradas as $entrada)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $entrada->cliente->nombre }}</td>
											<td>{{ $entrada->tipodeingreso->nombre }}</td>
											<td>{{ $entrada->categoriadeentrada->nombre }}</td>
											<td>{{ $entrada->proyecto->nombre }}</td>
                                            <td>{{ $entrada->usuario_edito }}  <br/> {{ $entrada->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('entradas.destroy',$entrada->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('entradas.show',$entrada->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('entradas.edit',$entrada->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $entradas->links() !!}
            </div>
        </div>
    </div>
@endsection