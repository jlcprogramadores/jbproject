@extends('adminlte::page')
@section('title','Tipo De Direcciones')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipo De Direcciones') }}
                            </span>
                            @can('tipo-de-direcciones.acciones')
                                <div class="float-right">
                                    <a href="{{ route('tipo-de-direcciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Tipo De Dirección') }}
                                    </a>
                                </div>
                            @endcan
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('danger'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Es Fiscal</th>
                                        <th>Actualización</th>
                                        @can('tipo-de-direcciones.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipoDeDirecciones as $tipoDeDireccione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tipoDeDireccione->nombre }}</td>
											<td>{{ $tipoDeDireccione->es_fiscal ? 'SI' : 'NO'}}</td>
                                            <td><span class="peque">{{ $tipoDeDireccione->usuario_edito }}</span>  <br/> <span class="peque">{{ $tipoDeDireccione->updated_at }}</span></td>
                                            @can('tipo-de-direcciones.acciones')
                                                <td>
                                                    <form action="{{ route('tipo-de-direcciones.destroy',$tipoDeDireccione->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('tipo-de-direcciones.show',$tipoDeDireccione->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('tipo-de-direcciones.edit',$tipoDeDireccione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
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
                {!! $tipoDeDirecciones->links() !!}
            </div>
        </div>
    </div>
@endsection
