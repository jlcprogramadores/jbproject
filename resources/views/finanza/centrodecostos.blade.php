@extends('adminlte::page')
@section('title','Centro De Costos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Centro De Costos') }}
                            </span>
                             <div class="float-right">
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
                    @if ($message = Session::get('danger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                        
										<th>Proyecto</th>
										<th>Presupuesto</th>
                                        <th>Margen</th>
                                        <th>Costo Actual</th>
                                        <th>Utilidad</th>
                                        <th>Factor de Utilidad</th>
                                        <th>Límite</th>
                                    </tr>
                                </thead>
                                                                       
                                <tbody>
                                    @foreach ($finanzas as $finanza)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{$finanza['nombre']}}</td> 
                                        <td>${{number_format($finanza['presupuesto'],2)}}</td>    
                                        <td>${{number_format($finanza['margen'],2)}}</td> 
                                        <td>${{number_format($finanza['costo'],2)}}</td> 
                                        <td>${{number_format($finanza['utilidad'],2)}}</td> 
                                        @if (($finanza['utilidad']-$finanza['costo']) > 0)
                                            <td><p class="text-success">+ {{number_format($finanza['utilidad']-$finanza['costo'],2)}}</p></td>
                                        @else
                                            <td><p class="text-danger">{{number_format($finanza['utilidad']-$finanza['costo'],2)}}</p></td>
                                        @endif
                                        @if ($finanza['costo'] < $finanza['presupuesto'])
                                                <td><p class="badge bg-success">Debajo del presupuesto</p></td>
                                        @elseif ($finanza['costo'] < $finanza['margen'])
                                            <td><p class="badge bg-warning text-dark">Dentro del margen</p></td>
                                        @else
                                            <td><p class="badge bg-danger">Presupuesto excedido</p></td>
                                        @endif
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