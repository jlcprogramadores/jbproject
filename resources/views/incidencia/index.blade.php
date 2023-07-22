@extends('adminlte::page')
@section('title','Incidencias')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Incidencia') }}
                            </span>

                             <div class="float-right">
                                @can('incidencias.acciones')
                                <a href="{{ route('incidencias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva Incidencia') }}
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Empleado</th>
										<th>Proyecto</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Justificante</th>
										<th>Comentario</th>
										<th>Fecha Actualización</th>
                                        @can('incidencias.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incidencias as $incidencia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $incidencia->empleado->nombre }}</td>
											<td>{{ $incidencia->proyecto->nombre }}</td>
											<td>{{ Carbon\Carbon::parse($incidencia->fecha_inicio)->format('Y-m-d')  }}</td>
											<td>{{ Carbon\Carbon::parse($incidencia->fecha_fin)->format('Y-m-d') }}</td>
											<td>
                                                @if ($incidencia->justificante)
                                                    <a href="{{$incidencia->justificante}}">Ver Justificante</a>
                                                @else
                                                    <span class="text-danger"> Sin Justificante</span>
                                                @endif
                                            </td>
											<td>{{ $incidencia->comentario }}</td>
                                            <td><span class="peque">{{ $incidencia->usuario_edito }}</span>  <br/> <span class="peque">{{ $incidencia->updated_at }}</span></td>

                                            @can('incidencias.acciones')
                                                <td>
                                                    <form action="{{ route('incidencias.destroy',$incidencia->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('incidencias.show',$incidencia->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('incidencias.edit',$incidencia->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
            </div>
        </div>
    </div>
@endsection

