@extends('adminlte::page')
@section('title','Detalle Población')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Detalle Población Proyecto: ') . $proyecto[0]->nombre}}
                            </span>
                             <div class="float-right">
                                <a href="{{ route('empleados.poblacion') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
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
                                        <th>Número De Empleado</th>
										<th>Nombre</th>
                                        <th>Salario Real</th>
                                        <th>Puesto</th>
                                        <th>Es Activo</th>
                                    </tr>
                                </thead>
                                                                       
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                    <tr>
                                        <td>{{ ++$i }}</td> 
                                        
                                        <td>{{ $empleado['no_empleado'] }}</td>
                                        <td>{{ $empleado['nombre'] }}</td>
                                        <td>${{number_format($empleado['salario_real'],2)}}</td> 
                                        <td>{{$empleado->puesto->nombre}}</td>
                                        @if ($empleado['esta_trabajando'])
                                            <td><p class="badge bg-success">Activo</p></td>
                                        @else
                                            <td><p class="badge bg-danger">Inactivo</p></td>
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
