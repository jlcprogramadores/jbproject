@extends('adminlte::page')
@section('title','Control Gasolinera')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Control Gasolinera') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('control-gasolineras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo Registro') }}
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
										<th>Gasolinera</th>
										<th>Destino</th>
										<th>Folio</th>
										<th>Ticket</th>
										<th>Producto</th>
										<th>Litros</th>
										<th>Precio Unitario</th>
										<th>Total</th>
										<th>Fecha</th>
										<th>Carga</th>
										<th>Comentario</th>
										<th>Folio Factura</th>
										<th>Total Factura Neto</th>
										<th>Pagado</th>
										<th>Vale Archivo</th>
                                        <th>Fecha Actualización</th>
                                        
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($controlGasolineras as $controlGasolinera)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $controlGasolinera->gasolinera->nombre }}</td>
                                            <td>{{ $controlGasolinera->destino->nombre }}</td>
											<td>{{ $controlGasolinera->folio }}</td>
											<td>{{ $controlGasolinera->ticket }}</td>
											<td>{{ $controlGasolinera->producto }}</td>
											<td>{{ $controlGasolinera->litros }}</td>
                                            <td>{{ '$'. number_format($controlGasolinera->precio_unitario,2) }}</td>
                                            <td>{{ '$'. number_format($controlGasolinera->total,2) }}</td>
                                            <td >{{$controlGasolinera->fecha ? Carbon\Carbon::parse($controlGasolinera->fecha)->format('Y-m-d') : ''}}</td>
											<td>{{ $controlGasolinera->carga }}</td>
											<td>{{ $controlGasolinera->comentario }}</td>
											<td>{{ $controlGasolinera->folio_factura }}</td>
                                            <td>{{ '$'. number_format($controlGasolinera->total_factura_neto,2) }}</td>
                                            @if ($controlGasolinera['es_pagado'])
                                                <td><p class="badge bg-success">Pagado</p></td>
                                            @else
                                                <td><p class="badge bg-danger">Sin Pagar</p></td>
                                            @endif
                                            @if ($controlGasolinera->vale_archivo)
                                            <td><a href="{{$controlGasolinera->vale_archivo}}">Link de Vale</a></td>
                                            @else
                                                <td><span class="badge bg-danger">Sin Vale</span></td>
                                            @endif 
                                            <td><span class="peque">{{ $controlGasolinera->usuario_edito }}</span>  <br/> <span class="peque">{{ $controlGasolinera->updated_at }}</span></td>

                                            <td>
                                                <form action="{{ route('control-gasolineras.destroy',$controlGasolinera->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('control-gasolineras.show',$controlGasolinera->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('control-gasolineras.edit',$controlGasolinera->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $controlGasolineras->links() !!}
            </div>
        </div>
    </div>
@endsection