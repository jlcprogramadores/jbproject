@extends('adminlte::page')
@section('title','Candidatos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Candidatos') }}
                            </span>
                            @can('candidatos.acciones')
                             <div class="float-right">
                                <a href="{{ route('candidatos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Candidato') }}
                                </a>
                              </div>
                            @endcan
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover"  id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre Completo</th>
                                        <th>Puesto que aplica</th>
										<th>Género</th>
										<th>Teléfono Personal</th>
										<th>Correo</th>
										<th>Evaluación</th>
                                        <th>Semáforo</th>
										<th>Fecha Actualización</th>
                                        @can('candidatos.acciones')
                                            <th>Acciones</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidatos as $candidato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $candidato->nombre }}</td>
                                            <td>{{ isset($candidato->puesto->nombre) ? $candidato->puesto->nombre : 'Sin Puesto'}}</td>
                                            @if ($candidato->genero == 0)
                                                <td>Masculino</td>
                                            @elseif ($candidato->genero == 1)
                                                <td>Femenino</td>
                                            @else
                                                <td>Otro</td>
                                            @endif 
											<td>{{ $candidato->telefono_personal }}</td>
											<td>{{ $candidato->correo }}</td>
                                            <?php 
                                                $v1 = $candidato->validacion_1;
                                                $v2 = $candidato->validacion_2;
                                                $v3 = $candidato->validacion_3;
                                            ?>
                                           
                                            <td class="completo" style="line-height:0pt!important;"> 

                                                    @if (is_null($v1))
                                                        <p> 
                                                            Alex: <span class="badge bg-secondary">Sin Evaluar</span>,
                                                        </p> 
                                                    @elseif($v1 == 1)
                                                        <p>
                                                            Alex: <span class="badge bg-success">Aceptado</span>,
                                                        </p>
                                                    @else
                                                        <p>
                                                            Alex: <span class="badge bg-danger">Rechazado</span>,
                                                        </p>
                                                    @endif

                                                    @if (is_null($v2))
                                                        <p>
                                                            Cecy: <span class="badge bg-secondary">Sin Evaluar</span>,
                                                        </p>
                                                    @elseif($v2 == 1)
                                                        <p>
                                                            Cecy: <span class="badge bg-success">Aceptado</span>,
                                                        </p>
                                                    @else
                                                        <p>
                                                            Cecy: <span class="badge bg-danger">Rechazado</span>,
                                                        </p>
                                                    @endif

                                                    @if (is_null($v3))
                                                        <p>
                                                            Javier: <span class="badge bg-secondary">Sin Evaluar</span>,
                                                        </p>
                                                    @elseif($v3 == 1)
                                                        <p>
                                                            Javier: <span class="badge bg-success">Aceptado</span>,
                                                        </p>
                                                    @else
                                                        <p>
                                                            Javier: <span class="badge bg-danger">Rechazado</span>,
                                                        </p>
                                                    @endif
                                            </td>
                                            
                                            <td>
                                                @if ($v1 == 1 && $v2 == 1 && $v3 == 1)
                                                    </span> <p class="badge bg-success">Aceptado</p><br>
                                                @elseif($v1 === 0 || $v2 === 0 || $v3 === 0)
                                                    </span> <p class="badge bg-danger">Rechazado</p><br>
                                                @else
                                                    </span> <p class="badge bg-secondary">En trámite</p><br>
                                                @endif
                                            </td>

                                            
                                            <td><span class="peque">{{ $candidato->usuario_edito }}</span>  <br/> <span class="peque">{{ $candidato->updated_at }}</span></td>
                                            @can('candidatos.acciones')
                                                <td>
                                                    <form action="{{ route('candidatos.destroy',$candidato->id) }}" method="POST">
                                                        @if ( Auth::user()->hasRole('Validador_1') || Auth::user()->hasRole('Validador_2') || Auth::user()->hasRole('Validador_3'))
                                                            <a class="btn btn-sm btn-warning " href="{{ route('candidatos.evaluar',$candidato->id) }}"><i class="fa fa-fw fa-eye"></i>Evaluar</a>
                                                        @endif 
                                                        <a class="btn btn-sm btn-success " href="{{ route('documentos-candidatos.doccandidato', $candidato->id) }}"><i class="fa fa-fw fa-eye"></i>   {{ __('Documentos') }}</a>
                                                        <a class="btn btn-sm btn-primary " href="{{ route('candidatos.show',$candidato->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('candidatos.edit',$candidato->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> </button>
                                                        
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
                {!! $candidatos->links() !!}
            </div>
        </div>
    </div>
@endsection