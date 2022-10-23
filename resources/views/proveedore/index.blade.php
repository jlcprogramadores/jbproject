@extends('layouts.app')

@section('template_title')
    Proveedore
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proveedore') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>Razon Social</th>
										<th>Estado</th>
										<th>Dias De Credito</th>
										<th>Monto De Credito</th>
										<th>Es Facturable</th>
										<th>Mail</th>
										<th>Rfc</th>
										<th>Es Activo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proveedores as $proveedore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $proveedore->nombre }}</td>
											<td>{{ $proveedore->razon_social }}</td>
											<td>{{ $proveedore->estado }}</td>
											<td>{{ $proveedore->dias_de_credito }}</td>
											<td>{{ $proveedore->monto_de_credito }}</td>
											<td>{{ $proveedore->es_facturable }}</td>
											<td>{{ $proveedore->mail }}</td>
											<td>{{ $proveedore->rfc }}</td>
											<td>{{ $proveedore->es_activo }}</td>

                                            <td>
                                                <form action="{{ route('proveedores.destroy',$proveedore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('proveedores.show',$proveedore->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('proveedores.edit',$proveedore->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $proveedores->links() !!}
            </div>
        </div>
    </div>
@endsection
