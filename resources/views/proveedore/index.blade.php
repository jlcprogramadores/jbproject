@extends('adminlte::page')
@section('title','Proveedores')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-secondary">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Proveedores') }}
                        </span>
                        @can('proveedores.create')
                        <div class="float-right">
                            @can('proveedores.acciones')
                                <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Crear Proveedor') }}
                                </a>
                            @endcan
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
                                    <th>Razón Social</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Estado</th>
                                    <th>Días De Crédito</th>
                                    <th>Monto De Crédito</th>
                                    <th>Es Facturable</th>
                                    <th>Correo</th>
                                    <th>Rfc</th>
                                    <th>Actualización</th>
                                    <th class="botones">Datos</th>
                                    @can('proveedores.acciones')
                                        <th>Acciones</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $proveedore)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $proveedore->nombre }}</td>
                                    <td>{{ $proveedore->razon_social }}</td>

                                    <td>
                                        @foreach($proveedore->direcciones as $iterDireccion)
                                        <?php
                                        // iteramos y formamos las las dirreciones s
                                        $direccion = "";
                                        $direccion .= $iterDireccion->calle ? 'Calle: ' . $iterDireccion->calle : '';
                                        $direccion .= $iterDireccion->num_ext ? ' Num ext: ' . $iterDireccion->num_ext : '';
                                        $direccion .= $iterDireccion->num_int ? ' Num int: ' . $iterDireccion->num_int : '';
                                        $direccion .= $iterDireccion->colonia ? ' Col: ' . $iterDireccion->colonia : '';
                                        $direccion .= $iterDireccion->codigo_postal ? ' CP: ' . $iterDireccion->codigo_postal : '';
                                        $direccion .= $iterDireccion->municipio ? ' Municipio: ' . $iterDireccion->municipio : '';
                                        $direccion .= $iterDireccion->estado ? ' Estado: ' . $iterDireccion->estado : '';
                                        $direccion .= ",";
                                        ?>
                                        {{$direccion}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <?php $itel=0; ?>
                                        @foreach($proveedore->telefonos as $iterTelefono)
                                        <?php   
                                        ++$itel; 
                                        // iteramos y formamos las las dirreciones s
                                        $telefono = "";
                                        $telefono .= $iterTelefono->telefono ? 'Tel' . $itel . ': ' . $iterTelefono->telefono : '';
                                        $telefono .= ",";
                                        ?>
                                        {{$telefono}}
                                        @endforeach
                                    </td>
                                    <td class="completo">{{ $proveedore->estado }}</td>
                                    <td>{{ $proveedore->dias_de_credito }}</td>
                                    <td>{{ '$'. number_format($proveedore->monto_de_credito,2) }}</td>
                                    <td>{{ $proveedore->es_facturable ? 'SI' : 'NO' }}</td>
                                    <td>{{ $proveedore->mail }}</td>
                                    <td>{{ $proveedore->rfc }}</td>
                                    <td><span class="peque">{{ $proveedore->usuario_edito }}</span>  <br/> <span class="peque">{{ $proveedore->updated_at }}</span></td>
                                    <td>
                                        @can('direcciones.direccionproveedor')
                                        <a class="btn btn-sm btn-warning" href="{{ route('direcciones.direccionproveedor', ['id' => $proveedore->id]) }}"><i class="fa fa-fw fa-edit"></i> Dirección</a>
                                        @endcan
                                        @can('telefonos.telefonoproveedor') 
                                        <a class="btn btn-sm btn-warning" href="{{ route('telefonos.telefonoproveedor', ['id' => $proveedore->id]) }}"><i class="fa fa-fw fa-edit"></i> Teléfono</a>
                                        @endcan
                                        @can('cuentasbancarias.cuentabancariaproveedor')
                                        <a class="btn btn-sm btn-warning" href="{{ route('cuentas-bancarias.cuentabancariaproveedor', ['id' => $proveedore->id]) }}"><i class="fa fa-fw fa-edit"></i> Cuentas Bancarias</a>
                                        @endcan
                                    </td>
                                    @can('proveedores.acciones')
                                    <td>
                                        <form action="{{ route('proveedores.destroy',$proveedore->id) }}" method="POST">
                                            
                                            <a class="btn btn-sm btn-primary " href="{{ route('proveedores.show',$proveedore->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('proveedores.edit',$proveedore->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
            {!! $proveedores->links() !!}
        </div>
    </div>
</div>
@endsection