@extends('adminlte::page')
@section('title','Teléfonos')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Teléfonos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('telefonos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Teléfono') }}
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
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Cliente</th>
										<th>Proveedor</th>
										<th>Teléfono</th>
                                        <th>descripcion</th>
                                        <th>Actualización</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($telefonos as $telefono)
                                        <tr>
                                            
                                            <td>{{ ++$i }}</td>
											<td>{{ $telefono->cliente->nombre ?? '' }}</td>
											<td>{{ $telefono->proveedor->nombre ?? '' }}</td>
											<td>{{ $telefono->telefono }}</td>
                                            <td>{{ $telefono->descripcion }}</td>
                                            <td>{{ $telefono->usuario_edito }}  <br/> {{ $telefono->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('telefonos.destroy',$telefono->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('telefonos.show',$telefono->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('telefonos.edit',$telefono->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $telefonos->links() !!}
            </div>
        </div>
    </div>
@endsection