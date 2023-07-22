@extends('adminlte::page')
@section('title','Historial Paros')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Historial Del Paro:') }} {{$historialParos[0]->paro->nombre}}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('paros.index') }}"  class="btn btn-light btn-sm float-right"  data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
                                {{-- <a href="{{ route('historial-paros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a> --}}
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Paro</th>
										<th>Grupo</th>
										<th>Empleado</th>
                                        <th>Puesto</th>
                                        <th>Salario</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Comentario</th>
										<th>Fecha Actualización</th>

                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historialParos as $historialParo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $historialParo->nombre_paro}}</td>
											<td>{{ $historialParo->grupo->nombre }}</td>
											<td>{{ $historialParo->empleado->nombre }}</td>
                                            <td>{{ $historialParo->puesto->nombre }}</td>
                                            <td>{{ '$'. number_format($historialParo->salario,2) }}</td>
                                            <td>{{ Carbon\Carbon::parse($historialParo->fecha_inicio)->format('d-m-Y') }}</td>
                                            <td>{{ Carbon\Carbon::parse($historialParo->fecha_fin)->format('d-m-Y') }}</td>
											<td>{{ $historialParo->comentario }}</td>
											<td>{{ $historialParo->usuario_edito }}  <br/> {{ $historialParo->updated_at }}</td>

                                      
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $historialParos->links() !!}
            </div>
        </div>
    </div>
@endsection
