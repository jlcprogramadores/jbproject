@extends('layouts.app')

@section('title','Paros')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Paros') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('paros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Paro') }}
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
                                        
										<th>Empleado</th>
										<th>Proyecto</th>
										<th>Puesto</th>
										<th>Salario</th>
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
											<td>{{ $paro->salario }}</td>
											<td>{{ $paro->comentario }}</td>
											<td>{{ $paro->usuario_edito }}</td>

                                            <td>
                                                <form action="{{ route('paros.destroy',$paro->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('paros.show',$paro->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('paros.edit',$paro->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $paros->links() !!}
            </div>
        </div>
    </div>
@endsection
