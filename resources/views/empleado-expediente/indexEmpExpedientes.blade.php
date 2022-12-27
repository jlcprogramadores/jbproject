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
                                {{ __('Documetnos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('empleado-expedientes.docsFaltantes', $empleado->id) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Completar documetos') }}
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
                                        
										<th>nombre</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expedientes as $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $item->nombre }}</td>
                                            <td>
                                                <form action="{{ route('empleado-expedientes.destroy',$item->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empleado-expedientes.show',$item->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleado-expedientes.edit',$item->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $expedientes->links() !!}
            </div>
        </div>
    </div>
@endsection
