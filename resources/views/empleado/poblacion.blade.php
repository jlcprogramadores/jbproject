@extends('adminlte::page')

@section('title','Población')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-white border-secondary">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Población') }}
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
                    @if ($message = Session::get('danger'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Proyecto</th>
										<th>Costo De Nómina</th>
                                        <th>Total De Empleados</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                                                       
                                <tbody>
                                    @foreach ($costos as $costo)
                                    <tr>
                                        <td>{{ ++$i }}</td> 
                                        @if ($costo['mina']=='')
                                            <td>{{$costo['nombre']}}</td>
                                        @else
                                            <td>{{$costo['nombre']}} <br> Mina: {{$costo['mina']}}</td> 
                                        @endif
                                        <td>${{number_format($costo['costo_nomina'],2)}}</td> 
                                        <td>{{$costo['total_empleados']}}</td> 
                                        <td>
                                            @can('poblacion.detalle')
                                            <a class="btn btn-sm btn-primary " href="{{ route('empleados.poblaciondetalle',$costo['id_proyecto']) }}"><i class="fa fa-fw fa-eye"></i>  Detalle Población</a>
                                            @endcan
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