@extends('layouts.app')

@section('template_title')
    Requisicione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisicione') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('requisiciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Folio</th>
										<th>Departamento</th>
										<th>Proyecto</th>
										<th>Justificacion</th>
										<th>Archivo</th>
										<th>Esta Aprobada</th>
										<th>Aprobada Por</th>
										<th>Aprobada En</th>
										<th>Comprobante Aprobacion</th>
										<th>Usuario Edito</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requisiciones as $requisicione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $requisicione->folio }}</td>
											<td>{{ $requisicione->departamento }}</td>
											<td>{{ $requisicione->proyecto }}</td>
											<td>{{ $requisicione->justificacion }}</td>
											<td>{{ $requisicione->archivo }}</td>
											<td>{{ $requisicione->esta_aprobada }}</td>
											<td>{{ $requisicione->aprobada_por }}</td>
											<td>{{ $requisicione->aprobada_en }}</td>
											<td>{{ $requisicione->comprobante_aprobacion }}</td>
											<td>{{ $requisicione->usuario_edito }}</td>

                                            <td>
                                                <form action="{{ route('requisiciones.destroy',$requisicione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('requisiciones.show',$requisicione->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('requisiciones.edit',$requisicione->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $requisiciones->links() !!}
            </div>
        </div>
    </div>
@endsection
