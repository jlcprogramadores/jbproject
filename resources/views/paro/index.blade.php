@extends('adminlte::page')
@section('title','Paros')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Paros') }}
                            </span>
                            @can('paros.acciones')
                            <div class="float-right">
                                <a href="{{ route('paros.createParoGrupo') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Paro (Grupo Nuevo)') }}
                                </a>
                                <a href="{{ route('paros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Paro (Grupo Existente)') }}
                                </a>
                            </div>
                            @endcan
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
										<th>Proyecto</th>
                                        <th>Grupo</th>
										<th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Comentario</th>
										<th>Fecha Actualización</th>
                                        @can('paros.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paros as $paro)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $paro->nombre}}</td>
											<td>{{ $paro->proyecto->nombre}}</td>
                                            <td>{{ $paro->grupo->nombre}}</td>
                                            <td>{{ Carbon\Carbon::parse($paro->fecha_inicio)->format('Y-m-d')  }}</td>
                                            <td>{{ Carbon\Carbon::parse($paro->fecha_fin)->format('Y-m-d')  }}</td>
											<td>{{ $paro->comentario }}</td>
											<td>{{ $paro->usuario_edito }} <br/> {{ $paro->updated_at }}</td>

                                            @can('paros.acciones')
                                            <td>
                                                <form action="{{ route('paros.destroy',$paro->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-warning " href="{{ route('historial-paros.historialempleado',$paro->id) }}"><i class="fa fa-fw fa-eye"></i> Historial</a>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('paros.show',$paro->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('paros.edit',$paro->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $paros->links() !!}
            </div>
        </div>
    </div>
@endsection