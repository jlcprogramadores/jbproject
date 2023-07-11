@extends('adminlte::page')
@section('title','Resumen')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Resumen') }}
                            </span>

                             <div class="float-right">
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
                                        
										<th>Código Producto</th>
										<th>Descripción</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Entrada</th>
										<th>Salidas</th>
										<th>Stock Actual</th>
										<th>Precio Unitario</th>
										<th>Importe Inventario</th>
                                        <th>Mínimo</th>
                                        <th>Máximo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($query as $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $item->codigo }}</td>
											<td>{{ $item->descripcion }}</td>
											<td>{{ $item->marca }}</td>
											<td>{{ $item->modelo }}</td>
											<td>{{ $item->entradas }}</td>
											<td>{{ $item->salidas }}</td>
											<td>
                                                @if ($item->stocks < $item->minimo ||$item->stocks > $item->maximo)
                                                <p class="badge bg-danger">{{ $item->stocks }}q</p>
                                                @elseif($item->stocks - $item->rango_semaforo <= $item->minimo ||$item->stocks + $item->rango_semaforo >= $item->maximo)
                                                <p class="badge bg-warning">{{ $item->stocks }}w</p>
                                                @else
                                                {{ $item->stocks }}e
                                                @endif
                                            </td>
                                            <td>{{ '$'. number_format($item->precio_unitario,2) }}</td>
                                            <td>{{ '$'. number_format( $item->importe,2) }}</td>
											<td>{{ $item->minimo }}</td>
											<td>{{ $item->maximo }}</td>
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
