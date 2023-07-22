@extends('adminlte::page')
@section('title','Expedientes de Empleados')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Expedientes de Empleados') }}
                            </span>

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
                                        <th>No.Empleado</th>
										<th>Empleado</th>
                                        <th>Fecha Limite</th>
										<th>Fecha Actualización</th>
                                        @can('empleado-expedientes.acciones')
                                            <th>Acciones</th>   
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{-- fomato empleado --}}
                                                <?php 
                                                    $concatenado = isset($empleado->proyecto->mina) ? '-'.$empleado->proyecto->mina->abreviacion : '';
                                                    $fecha = $empleado->fecha_no_empleado ? Carbon\Carbon::parse($empleado->fecha_no_empleado)->format('dmy') : '';
                                                ?>
                                                {{ 'JB-'.$fecha.'-'.$empleado->no_empleado.$concatenado }}
                                            </td>
											<td>{{ $empleado->nombre }}</td>


                                            @if ($empleado->fecha_limite_expediente)
                                                <?php 
                                                    $fechaActual = Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                                                    $fechaLimite = Carbon\Carbon::parse( $empleado->fecha_limite_expediente)->format('Y-m-d');
                                                    
                                                    $shippingDate = Carbon\Carbon::createFromFormat('Y-m-d',$fechaLimite );
                                                    $diferencia_en_dias = $fechaActual->diffInDays($shippingDate);
                                                    //  si ya se paso el dia se concidera vencido
                                                    $estaVencido = false;

                                                ?>
                                                {{-- mayor iguala a 4 verde
                                                    = 3 marillo
                                                    si es menor rojo  --}}
                                                @if ($fechaActual > $fechaLimite && $diferencia_en_dias != 0)
                                                <td>
                                                    <p class="bg-danger text-white" >
                                                        Vencido
                                                        <br>
                                                        {{Carbon\Carbon::parse($empleado->fecha_limite_expediente)->format('Y-m-d')}}
                                                    </p>
                                                </td>
                                                @else     
                                                    <td> 
                                                        @if ($diferencia_en_dias >= 4)
                                                            <p class=" bg-success text-white" >
                                                                Restan {{$diferencia_en_dias}} días
                                                                <br>
                                                                {{Carbon\Carbon::parse($empleado->fecha_limite_expediente)->format('Y-m-d')}}
                                                            </p>
                                                        @elseif($diferencia_en_dias == 3)
                                                            <p class="bg-warning text-dark" >
                                                                Restan {{$diferencia_en_dias}} días
                                                                <br>
                                                                {{Carbon\Carbon::parse($empleado->fecha_limite_expediente)->format('Y-m-d')}}

                                                            </p>
                                                        @elseif($diferencia_en_dias >= -1)
                                                            <p class="bg-danger text-white" >
                                                                Restan {{$diferencia_en_dias}} días
                                                                <br>
                                                                {{Carbon\Carbon::parse($empleado->fecha_limite_expediente)->format('Y-m-d')}}
                                                            </p>
                                                        @endif

                                                    </td>
                                                @endif
                                            @else
                                                <td></td>
                                            @endif

                                            <td><span class="peque">{{ $empleado->usuario_edito }}</span>  <br/> <span class="peque">{{ $empleado->updated_at }}</span></td>

                                            @can('empleado-expedientes.acciones')
                                                <td>
                                                    <form action="{{ route('empleado-expedientes.destroy',$empleado->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-warning " href="{{ route('empleados.editarfechalimite',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i>Fecha Limite</a>                                                   
                                                        <a class="btn btn-sm btn-primary " href="{{ route('empleado-expedientes.showPorEmpleado',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar Expediente</a>
                                                        <a class="btn btn-sm btn-danger " href="{{ route('empleado-expedientes.Amonestacion',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i> Cartas Amonestación</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('empleado-expedientes.editExpediente',$empleado->id) }}"><i class="fa fa-fw fa-edit"></i> Editar Expediente</a>
                                                        @csrf
                                                    </form>
                                                </td>
                                            @endcan
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
