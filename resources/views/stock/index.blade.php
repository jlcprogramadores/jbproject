@extends('layouts.app')

@section('template_title')
    Stock
@endsection
@if(Auth::check() && Auth::user()->es_activo)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Stock') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('stocks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Producto Id</th>
										<th>Proveedor Id</th>
										<th>Destino</th>
										<th>Fecha</th>
										<th>Lote</th>
										<th>Cantidad</th>
										<th>Numero Factura</th>
										<th>Numero Documento</th>
										<th>Fecha Actualización</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $stock->producto_id }}</td>
											<td>{{ $stock->proveedor_id }}</td>
											<td>{{ $stock->destino }}</td>
											<td>{{ $stock->fecha }}</td>
											<td>{{ $stock->lote }}</td>
											<td>{{ $stock->cantidad }}</td>
											<td>{{ $stock->numero_factura }}</td>
											<td>{{ $stock->numero_documento }}</td>

                                            <td><span class="peque">{{ $stock->usuario_edito }}</span>  <br/> <span class="peque">{{ $stock->updated_at }}</span></td>
                                            <td>
                                                <form action="{{ route('stocks.destroy',$stock->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('stocks.show',$stock->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('stocks.edit',$stock->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $stocks->links() !!}
            </div>
        </div>
    </div>
@endsection
@endif
