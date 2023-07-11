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
                                {{ __('Direcciones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('direcciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Dirección') }}
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
                                        
										<th>Tipo De Direccion</th>
										<th>Cliente</th>
										<th>Proveedor</th>
										<th>Calle</th>
										<th>Num Int</th>
										<th>Num Ext</th>
										<th>Código Postal</th>
										<th>Colonia</th>
										<th>Municipio</th>
										<th>Estado</th>
										<th>Pais</th>
										<th>Es Activo</th>
                                        <th>Actualización</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($direcciones as $direccione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $direccione->tipodedirecciones->nombre }}</td>
											<td>{{ $direccione->cliente->nombre ?? '' }}</td>
											<td>{{ $direccione->proveedor->nombre ?? ''}}</td>
											<td>{{ $direccione->calle }}</td>
											<td>{{ $direccione->num_int }}</td>
											<td>{{ $direccione->num_ext }}</td>
											<td>{{ $direccione->codigo_postal }}</td>
											<td>{{ $direccione->colonia }}</td>
											<td>{{ $direccione->municipio }}</td>
											<td>{{ $direccione->estado }}</td>
											<td>{{ $direccione->pais }}</td>
											<td>{{ $direccione->es_activo }}</td>
                                            <td>{{ $direccione->usuario_edito }}  <br/> {{ $direccione->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('direcciones.destroy',$direccione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('direcciones.show',$direccione->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('direcciones.edit',$direccione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $direcciones->links() !!}
            </div>
        </div>
    </div>
@endsection