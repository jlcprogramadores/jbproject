@extends('adminlte::page')

@section('title','Historial Estado')



@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Historial Estado') }}
                            </span>

                             <div class="float-right">

                                {{-- <a href="{{ route('historial-altas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva Alta/Baja') }}
                                </a> --}}
                                <a class="btn btn-light" href="{{ route('empleados.index') }}"> Atrás</a>
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
                                        
										<th>No Empleado</th>
										<th>Empleado</th>
										<th>Estado</th>
										<th>Fecha Del Suceso</th>
										<th>Comentario</th>
										<th>Usuario Edito</th>

                                        {{-- <th>Acciones</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historialAltas as $historialAlta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $historialAlta->empleado->no_empleado }}</td>
											<td>{{ $historialAlta->empleado->nombre }}</td>
											<td>
                                                @if ($historialAlta->tipo)
                                                <span class="badge bg-success">Alta</span>
                                                @else
                                                <span class="badge bg-danger">Baja</span>
                                                @endif
                                            </td>
											<td>{{ $historialAlta->fecha_suceso ? Carbon\Carbon::parse($historialAlta->fecha_suceso)->format('Y-m-d') : '' }}</td>
											<td>{{ $historialAlta->comentario }}</td>
											<td><span class="peque">{{ $historialAlta->usuario_edito }}</span>  <br/> <span class="peque">{{ $historialAlta->updated_at }}</span> <br> </td>

                                            {{-- <td>
                                                <form action="{{ route('historial-altas.destroy',$historialAlta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('historial-altas.show',$historialAlta->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('historial-altas.edit',$historialAlta->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td> --}}
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