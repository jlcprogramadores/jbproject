@extends('adminlte::page')
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
                                <a href="{{ route('historial-contratos.create',['id'=>$empleado_id ,'nombre'=>$nombre ]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Añadir contrato') }}
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
                                        
										<th>Contrato</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Fecha Actualización</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historialContratos as $historialContrato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>
                                                @if ($historialContrato->contrato)
                                                    <a href="{{ $historialContrato->contrato }}" target="_blank">Ver contrato</a>
                                                @else 
                                                    No hay
                                                @endif    
                                            </td>
											<td>{{ $historialContrato->fecha_inicio ?  Carbon\Carbon::parse($historialContrato->fecha_inicio)->format('Y-m-d') :'' }}</td>
											<td>{{ $historialContrato->fecha_fin ?  Carbon\Carbon::parse($historialContrato->fecha_fin)->format('Y-m-d') :'' }}</td>
                                            <td><span class="peque">{{ $historialContrato->usuario_edito }}</span>  <br/> <span class="peque">{{ $historialContrato->updated_at }}</span></td>
                                            <td>
                                                <form action="{{ route('historial-contratos.destroy',$historialContrato->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('historial-contratos.show',$historialContrato->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('historial-contratos.edit',$historialContrato->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
            </div>
        </div>
    </div>
@endsection