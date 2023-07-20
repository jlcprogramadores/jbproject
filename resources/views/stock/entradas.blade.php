@extends('adminlte::page')
@section('title','Entradas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Entradas') }}
                            </span>

                             <div class="float-right">
                                @can('entradas.acciones')
                                    <a href="{{ route('stocks.create-entrada') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Entrada') }}
                                    </a>
                                @endcan
                                {{-- <a href="{{ route('stocks.create-salida') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Salida') }}
                                </a> --}}
                              </div>
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
                                        
										<th>Producto</th>
										<th>Proveedor</th>
										{{-- <th>Destino</th> --}}
										<th>Fecha</th>
										<th>Lote</th>
										<th>Cantidad</th>
										<th>Numero Factura</th>
										<th>Fecha Actualización</th>
                                        @can('entradas.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $stock->producto->descripcion }}</td>
											<td>{{ $stock->proveedor->nombre }}</td>
											{{-- <td>{{ $stock->destino }}</td> --}}
											<td >{{$stock->fecha ? Carbon\Carbon::parse($stock->fecha)->format('Y-m-d') : ''}}</td>
											<td>{{ $stock->lote }}</td>
											<td>{{ $stock->cantidad }}</td>
											<td>{{ $stock->numero_factura }}</td>

                                            <td><span class="peque">{{ $stock->usuario_edito }}</span>  <br/> <span class="peque">{{ $stock->updated_at }}</span></td>
                                            <td>
                                                <form action="{{ route('stocks.destroy',$stock->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('stocks.show',$stock->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a> --}}
                                                    @can('entradas.acciones')
                                                        <a class="btn btn-sm btn-success" href="{{ route('stocks.editentradas',$stock->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i></button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
