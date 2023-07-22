@extends('adminlte::page')

@section('template_title')
    Grupos Empleado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Grupos Empleado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('grupos-empleados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Grupo</th>
										<th>Empleado</th>
										<th>Puesto</th>
										<th>Salario</th>
										<th>Fecha Actualización</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gruposEmpleados as $gruposEmpleado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $gruposEmpleado->grupo->nombre }}</td>
											<td>{{ $gruposEmpleado->empleado->nombre }}</td>
											<td>{{ $gruposEmpleado->puesto->nombre }}</td>
                                            <td>{{ '$'. number_format( $gruposEmpleado->salario,2) }}</td>
                                            <td>{{ $gruposEmpleado->usuario_edito }}  <br/> {{ $gruposEmpleado->updated_at }}</td>

                                            <td>
                                                <form action="{{ route('grupos-empleados.destroy',$gruposEmpleado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('grupos-empleados.show',$gruposEmpleado->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('grupos-empleados.edit',$gruposEmpleado->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $gruposEmpleados->links() !!}
            </div>
        </div>
    </div>
@endsection
