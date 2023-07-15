@extends('adminlte::page')
@section('title','Direcciones')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Direcciones de Proveedor') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('proveedores.index') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
                                @can('direcciones.acciones')    
                                    <a href="{{ route('direcciones.create', ['id' => $id, 'tipo' => 'proveedor', 'nombre'=> $nombre]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                        {{ __('Crear Dirección') }}
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
										<th>Nombre</th>
										<th>Calle</th>
										<th>Num Int</th>
										<th>Num Ext</th>
										<th>Código Postal</th>
										<th>Colonia</th>
										<th>Municipio</th>
										<th>Estado</th>
										<th>Pais</th>
                                        <th>Actualización</th>
                                        @can('direcciones.acciones')    
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($direcciones as $direccione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $direccione->proveedor->nombre }}</td>
											<td>{{ $direccione->calle }}</td>
											<td>{{ $direccione->num_int }}</td>
											<td>{{ $direccione->num_ext }}</td>
											<td>{{ $direccione->codigo_postal }}</td>
											<td>{{ $direccione->colonia }}</td>
											<td>{{ $direccione->municipio }}</td>
											<td>{{ $direccione->estado }}</td>
											<td>{{ $direccione->pais }}</td>
                                            <td><span class="peque">{{ $direccione->usuario_edito }}</span>  <br/> <span class="peque">{{ $direccione->updated_at }}</span></td>
                                            @can('direcciones.acciones') 
                                                <td>
                                                    <form action="{{ route('direcciones.destroy',$direccione->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-success" href="{{ route('direcciones.edit',$direccione->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $direcciones->links() !!}
            </div>
        </div>
    </div>
@endsection
