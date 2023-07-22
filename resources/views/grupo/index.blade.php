@extends('adminlte::page')
@section('title','Grupos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Grupo') }}
                            </span>

                             <div class="float-right">
                                @can('grupos.acciones')
                                <a href="{{ route('grupos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Grupo') }}
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
										<th>Fecha Actualización</th>

                                        @can('grupos.acciones')
                                            <th>Acciones</th>   
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grupos as $grupo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $grupo->nombre }}</td>
                                            <td><span class="peque">{{ $grupo->usuario_edito }}</span>  <br/> <span class="peque">{{ $grupo->updated_at }}</span> </td>
                                            @can('grupos.acciones')
                                                <td>
                                                    <form action="{{ route('grupos.destroy',$grupo->id) }}" method="POST">
                                                    
                                                        <a class="btn btn btn-sm btn-primary" href="{{ route('grupos-empleado.grupoPorEmpleados', ['id' => $grupo->id]) }}"><i class="fa fa-fw fa-edit"></i> Lista de Empleados</a>
                                                        {{-- <a class="btn btn-sm btn-primary " href="{{ route('grupos.show',$grupo->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar Empleados</a> --}}
                                                        <a class="btn btn-sm btn-success" href="{{ route('grupos.edit',$grupo->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                        
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
                {!! $grupos->links() !!}
            </div>
        </div>
    </div>
@endsection

