@extends('adminlte::page')
@section('title','Clientes')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Clientes') }}
                            </span>
                            @can('clientes.acciones')
                            <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Cliente') }}
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
										<th>Razón Social</th>
										<th>Correo</th>
										<th>RFC</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Actualización</th>
                                        @can('clientes.acciones')
                                            <th class="botones">Datos</th>    
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cliente->nombre }}</td>
											<td>{{ $cliente->razon_social }}</td>
											<td>{{ $cliente->mail }}</td>
											<td>{{ $cliente->rfc }}</td>
											<td>@foreach($cliente->direcciones as $iterDireccion)
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
                                                @foreach($cliente->telefonos as $iterTelefono)
                                                <?php   
                                                ++$itel; 
                                                // iteramos y formamos las las direciones
                                                $telefono = "";
                                                $telefono .= $iterTelefono->telefono ? 'Tel' . $itel . ': ' . $iterTelefono->telefono : '';
                                                $telefono .= ",";
                                                ?>
                                                {{$telefono}}
                                                @endforeach
                                            </td>
                                            <td><span class="peque">{{ $cliente->usuario_edito }}</span>  <br/> <span class="peque">{{ $cliente->updated_at }}</span></td>
                                            @can('clientes.acciones')
                                                <td>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('direcciones.direccioncliente', ['id' => $cliente->id]) }}"><i class="fa fa-fw fa-edit"></i> Dirección</a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('telefonos.telefonocliente', ['id' => $cliente->id]) }}"><i class="fa fa-fw fa-edit"></i> Teléfono</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('clientes.show',$cliente->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('clientes.edit',$cliente->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $clientes->links() !!}
            </div>
        </div>
    </div>
@endsection