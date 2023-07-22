@extends('adminlte::page')
@section('title','Empleados del Grupo: ' . $nombre)


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empleados del Grupo: ') . $nombre}}
                            </span>
                             <div class="float-right">
                                <a href="{{ route('grupos.index') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
                                <a href="{{ route('grupos-empleados.formEmpleadoNuevoGrupo', ['idGrupo' => ($gruposEmpleados[0]->grupo_id) ]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Añadir Empleado al Grupo') }}
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
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Grupo</th>
                                        <th>Empleado</th>
										<th>Puesto</th>
										<th>Salario</th>
                                        <th>Editar Empleado</th>
                                        {{-- <th>Acciones</th> --}}
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

                                            <td>
                                                <form action="{{ route('grupos-empleados.destroy',$gruposEmpleado->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('grupos-empleados.show',$gruposEmpleado->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('grupos-empleados.edit',$gruposEmpleado->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
