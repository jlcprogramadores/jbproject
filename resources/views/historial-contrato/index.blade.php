@extends('layouts.app')

@section('title','Historial Contrato')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ 'Historial Contrato de '.$nombre }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('historial-contratos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Actulizar contrato') }}
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
                                        
										<th>Contrato</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historialContratos as $historialContrato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $historialContrato->contrato }}</td>
											<td>{{ $historialContrato->fecha_inicio }}</td>
											<td>{{ $historialContrato->fecha_fin }}</td>

                                            <td>
                                                <form action="{{ route('historial-contratos.destroy',$historialContrato->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('historial-contratos.show',$historialContrato->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('historial-contratos.edit',$historialContrato->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
            </div>
        </div>
    </div>
@endsection
