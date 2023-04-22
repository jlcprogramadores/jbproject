@extends('layouts.app')

@section('template_title')
    Control Gasolinera
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Control Gasolinera') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('control-gasolineras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Gasolinera Id</th>
										<th>Destino Id</th>
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
										<th>Es Pagado</th>
										<th>Vale Archivo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($controlGasolineras as $controlGasolinera)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $controlGasolinera->gasolinera_id }}</td>
											<td>{{ $controlGasolinera->destino_id }}</td>
											<td>{{ $controlGasolinera->folio }}</td>
											<td>{{ $controlGasolinera->ticket }}</td>
											<td>{{ $controlGasolinera->producto }}</td>
											<td>{{ $controlGasolinera->litros }}</td>
											<td>{{ $controlGasolinera->precio_unitario }}</td>
											<td>{{ $controlGasolinera->total }}</td>
											<td>{{ $controlGasolinera->fecha }}</td>
											<td>{{ $controlGasolinera->carga }}</td>
											<td>{{ $controlGasolinera->comentario }}</td>
											<td>{{ $controlGasolinera->folio_factura }}</td>
											<td>{{ $controlGasolinera->total_factura_neto }}</td>
											<td>{{ $controlGasolinera->es_pagado }}</td>
											<td>{{ $controlGasolinera->vale_archivo }}</td>

                                            <td>
                                                <form action="{{ route('control-gasolineras.destroy',$controlGasolinera->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('control-gasolineras.show',$controlGasolinera->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('control-gasolineras.edit',$controlGasolinera->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
