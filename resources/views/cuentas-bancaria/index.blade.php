@extends('adminlte::page')
@section('title','Cuentas Bancarias')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cuentas Bancarias') }}
                            </span>

                            @can('cuentasbancarias.acciones')
                             <div class="float-right">
                                @if (isset($id))
                                <a href="{{ route('proveedores.index') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
                                <a href="{{ route('cuentas-bancarias.create', ['id' => $id, 'nombre'=> $nombre ]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    @endif
                                    {{ __('Crear Cuenta Bancaria') }}
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Proveedor</th>
										<th>Banco</th>
										<th>Titular Banco</th>
										<th>Cuenta</th>
										<th>Clabe</th>
										<th>Tarjeta</th>
                                        <th>Actualización</th>
                                        @can('cuentasbancarias.acciones')
                                            <th></th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuentasBancarias as $cuentasBancaria)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cuentasBancaria->proveedor->nombre }}</td>
											<td>{{ $cuentasBancaria->banco }}</td>
											<td>{{ $cuentasBancaria->titular_banco }}</td>
											<td>{{ $cuentasBancaria->cuenta }}</td>
											<td>{{ $cuentasBancaria->clabe }}</td>
											<td>{{ $cuentasBancaria->tarjeta }}</td>
                                            <td><span class="peque">{{ $cuentasBancaria->usuario_edito }}</span>  <br/> <span class="peque">{{ $cuentasBancaria->updated_at }}</span></td>
                                            @can('cuentasbancarias.acciones')
                                                <td>
                                                    <form action="{{ route('cuentas-bancarias.destroy',$cuentasBancaria->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('cuentas-bancarias.show',$cuentasBancaria->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('cuentas-bancarias.edit',$cuentasBancaria->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $cuentasBancarias->links() !!}
            </div>
        </div>
    </div>
@endsection
