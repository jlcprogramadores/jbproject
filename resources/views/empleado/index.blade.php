@extends('layouts.app')

@section('template_title')
    Empleado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empleado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Proyecto Id</th>
										<th>Puesto Id</th>
										<th>No Empleado</th>
										<th>Apellido Materno</th>
										<th>Apellido Paterno</th>
										<th>Nombre</th>
										<th>Genero</th>
										<th>Telefono Personal</th>
										<th>Correo</th>
										<th>Salario Imss</th>
										<th>Salario Real</th>
										<th>Tipo De Empleado</th>
										<th>Evaluaciones</th>
										<th>Dc3</th>
										<th>Clims</th>
										<th>Fecha Ingreso</th>
										<th>Fecha Baja</th>
										<th>Nuevo Ingreso Reingreso</th>
										<th>Campamento</th>
										<th>Identificacion Oficial</th>
										<th>Curp</th>
										<th>Rfc</th>
										<th>Domicilio</th>
										<th>Nss</th>
										<th>Fecha Nacimiento</th>
										<th>Lugar Nacimiento</th>
										<th>Residencia</th>
										<th>Vacunas Covid</th>
										<th>Licencia Conducir</th>
										<th>Carta Antecedentes</th>
										<th>Estado Civil</th>
										<th>Nivel Estudios</th>
										<th>Infonavit</th>
										<th>Fonacot</th>
										<th>Cuenta Bancaria</th>
										<th>Contacto Emergencia</th>
										<th>Nombre Esposa</th>
										<th>No Hijos</th>
										<th>Persona Para Tramites</th>
										<th>Beneficiarios</th>
										<th>Porcentaje</th>
										<th>Domicilio Real</th>
										<th>Domicilio Alterno</th>
										<th>Talla Camisa</th>
										<th>Talla Pantalon</th>
										<th>Talla Calzado</th>
										<th>Enfermedades</th>
										<th>Cirugias</th>
										<th>Alergias</th>
										<th>Lentes</th>
										<th>Lesiones</th>
										<th>Fumador</th>
										<th>Practica Deporte</th>
										<th>Pertenece Club Social</th>
										<th>Pertenece Sindicato</th>
										<th>Toma Medicamento</th>
										<th>Tipo Sangre</th>
										<th>Peso</th>
										<th>Estatura</th>
										<th>Imc</th>
										<th>Esta Trabajando</th>
										<th>Usuario Edito</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ isset($empleado->proyecto->nombre) ? $empleado->proyecto->nombre : 'Sin Proyecto'}}</td>
											<td>{{ isset($empleado->puesto->nombre) ? $empleado->puesto->nombre : 'Sin Puesto'}}</td>
											<td>{{ $empleado->no_empleado }}</td>
											<td>{{ $empleado->apellido_materno }}</td>
											<td>{{ $empleado->apellido_paterno }}</td>
											<td>{{ $empleado->nombre }}</td>
											<td>{{ $empleado->genero }}</td>
											<td>{{ $empleado->telefono_personal }}</td>
											<td>{{ $empleado->correo }}</td>
											<td>{{ $empleado->salario_imss }}</td>
											<td>{{ $empleado->salario_real }}</td>
											<td>{{ $empleado->tipo_de_empleado }}</td>
											<td>{{ $empleado->evaluaciones }}</td>
											<td>{{ $empleado->dc3 }}</td>
											<td>{{ $empleado->clims }}</td>
											<td>{{ $empleado->fecha_ingreso }}</td>
											<td>{{ $empleado->fecha_baja }}</td>
											<td>{{ $empleado->nuevo_ingreso_reingreso }}</td>
											<td>{{ $empleado->campamento }}</td>
											<td>{{ $empleado->identificacion_oficial }}</td>
											<td>{{ $empleado->curp }}</td>
											<td>{{ $empleado->rfc }}</td>
											<td>{{ $empleado->domicilio }}</td>
											<td>{{ $empleado->nss }}</td>
											<td>{{ $empleado->fecha_nacimiento }}</td>
											<td>{{ $empleado->lugar_nacimiento }}</td>
											<td>{{ $empleado->residencia }}</td>
											<td>{{ $empleado->vacunas_covid }}</td>
											<td>{{ $empleado->licencia_conducir }}</td>
											<td>{{ $empleado->carta_antecedentes }}</td>
											<td>{{ $empleado->estado_civil }}</td>
											<td>{{ $empleado->nivel_estudios }}</td>
											<td>{{ $empleado->infonavit }}</td>
											<td>{{ $empleado->fonacot }}</td>
											<td>{{ $empleado->cuenta_bancaria }}</td>
											<td>{{ $empleado->contacto_emergencia }}</td>
											<td>{{ $empleado->nombre_esposa }}</td>
											<td>{{ $empleado->no_hijos }}</td>
											<td>{{ $empleado->persona_para_tramites }}</td>
											<td>{{ $empleado->beneficiarios }}</td>
											<td>{{ $empleado->porcentaje }}</td>
											<td>{{ $empleado->domicilio_real }}</td>
											<td>{{ $empleado->domicilio_alterno }}</td>
											<td>{{ $empleado->talla_camisa }}</td>
											<td>{{ $empleado->talla_pantalon }}</td>
											<td>{{ $empleado->talla_calzado }}</td>
											<td>{{ $empleado->enfermedades }}</td>
											<td>{{ $empleado->cirugias }}</td>
											<td>{{ $empleado->alergias }}</td>
											<td>{{ $empleado->lentes }}</td>
											<td>{{ $empleado->lesiones }}</td>
											<td>{{ $empleado->fumador }}</td>
											<td>{{ $empleado->practica_deporte }}</td>
											<td>{{ $empleado->pertenece_club_social }}</td>
											<td>{{ $empleado->pertenece_sindicato }}</td>
											<td>{{ $empleado->toma_medicamento }}</td>
											<td>{{ $empleado->tipo_sangre }}</td>
											<td>{{ $empleado->peso }}</td>
											<td>{{ $empleado->estatura }}</td>
											<td>{{ $empleado->imc }}</td>
											<td>{{ $empleado->esta_trabajando }}</td>
											<td>{{ $empleado->usuario_edito }}</td>

                                            <td>
                                                <form action="{{ route('empleados.destroy',$empleado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empleados.show',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleados.edit',$empleado->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $empleados->links() !!}
            </div>
        </div>
    </div>
@endsection
