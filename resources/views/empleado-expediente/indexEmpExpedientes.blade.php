@extends('adminlte::page')
@section('title','Editar Expediente')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ 'Editar Expediente De: '.$empleado->nombre }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('empleado-expedientes.index') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
                                <a href="{{ route('empleado-expedientes.docsFaltantes', $empleado->id) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Completar Documentos del Expediente') }}
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
                                        
										<th>Nombre del Documento</th>

                                        <th>Actualización</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expedientes as $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td class="text-uppercase">{{ strtr($item->nombre,'_',' ') }}</td>
                                            <td><span class="peque">{{ $item->usuario_edito }}</span>  <br/> <span class="peque">{{ $item->updated_at }}</span></td>
                                            <td>
                                                <form action="{{ route('empleado-expedientes.destroy',$item->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empleado-expedientes.show',$item->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleado-expedientes.edit',$item->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i></button>
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