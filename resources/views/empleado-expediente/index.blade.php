@extends('layouts.app')

@section('title','Empleado-Expedientes')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empleado Expediente') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('empleado-expedientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Empleado-Expediente') }}
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
										<th>Expediente</th>
										<th>Link Archivo</th>
										<th>Fecha Actualización</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleadoExpedientes as $empleadoExpediente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $empleadoExpediente->empleado->nombre }}</td>
											<td>{{ $empleadoExpediente->expediente->nombre }}</td>
											<td>{{ $empleadoExpediente->archivo }}</td>
											<td>{{ $empleadoExpediente->usuario_edito }}</td>

                                            <td>
                                                <form action="{{ route('empleado-expedientes.destroy',$empleadoExpediente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empleado-expedientes.show',$empleadoExpediente->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleado-expedientes.edit',$empleadoExpediente->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $empleadoExpedientes->links() !!}
            </div>
        </div>
    </div>
@endsection
