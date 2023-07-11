@extends('adminlte::page')
@section('title','Teléfonos de Proveedor')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Teléfonos de Proveedor') }}
                            </span>
                             <div class="float-right">
                                <a href="{{ route('proveedores.index') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
                                @can('telefonos.acciones')
                                <a href="{{ route('telefonos.create', ['id' => $id, 'tipo' => 'proveedor', 'nombre'=> $nombre ]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Teléfono') }}
                                </a>
                                @endcan
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
                                        
										<th>Proveedor</th>
										<th>Teléfono</th>
                                        <th>Descripción</th>
                                        <th>Actualización</th>
                                        @can('telefonos.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($telefonos as $telefono)
                                        <tr>
                                            
                                            <td>{{ ++$i }}</td>
											<td>{{ $telefono->proveedor->nombre}}</td>
											<td>{{ $telefono->telefono }}</td>
                                            <td>{{ $telefono->descripcion }}</td>
                                            <td><span class="peque">{{ $telefono->usuario_edito }}</span>  <br/> <span class="peque">{{ $telefono->updated_at }}</span></td>
                                            @can('telefonos.acciones')
                                                <td>
                                                    <form action="{{ route('telefonos.destroy',$telefono->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-success" href="{{ route('telefonos.edit',$telefono->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $telefonos->links() !!}
            </div>
        </div>
    </div>
@endsection
