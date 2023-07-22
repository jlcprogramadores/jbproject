@extends('adminlte::page')
@section('title','Expedientes')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Documentos de Expedientes') }}
                            </span>
                            {{-- @can('expedientes.create')  --}}
                            {{-- <div class="float-right">
                                <a href="{{ route('expedientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Expediente') }}
                                </a>
                            </div> --}}
                            {{-- @endcan --}}
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
										<th>Es Múltiple</th>
										<th>Fecha Actualización</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expedientes as $expediente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $expediente->nombre }}</td>
											{{-- <td>{{  }}</td> --}}
                                            @if ($expediente->es_multiple == 0)
                                                <td><p class="badge bg-danger">No</p></td>
                                            @else
                                                <td><p class="badge bg-success">Sí</p></td>
                                            @endif
											<td>{{ $expediente->usuario_edito }}  <br/> {{ $expediente->updated_at }}</td>

                                            <td>
                                                <form action="{{ route('expedientes.destroy',$expediente->id) }}" method="POST">
                                                    @can('expedientes.show') 
                                                    <a class="btn btn-sm btn-primary " href="{{ route('expedientes.show',$expediente->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    @endcan
                                                    @can('expedientes.edit') 
                                                    <a class="btn btn-sm btn-success" href="{{ route('expedientes.edit',$expediente->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- @can('expedientes.destroy')  --}}
                                                    {{-- <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button> --}}
                                                    {{-- @endcan --}}
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