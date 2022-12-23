@extends('layouts.app')

@section('template_title')
    {{ $empleado->name ?? 'Show Empleado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proyecto Id:</strong>
                            {{ $empleado->proyecto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Puesto Id:</strong>
                            {{ $empleado->puesto_id }}
                        </div>
                        <div class="form-group">
                            <strong>No Empleado:</strong>
                            {{ $empleado->no_empleado }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Materno:</strong>
                            {{ $empleado->apellido_materno }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Paterno:</strong>
                            {{ $empleado->apellido_paterno }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $empleado->genero }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono Personal:</strong>
                            {{ $empleado->telefono_personal }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $empleado->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Salario Imss:</strong>
                            {{ $empleado->salario_imss }}
                        </div>
                        <div class="form-group">
                            <strong>Salario Real:</strong>
                            {{ $empleado->salario_real }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo De Empleado:</strong>
                            {{ $empleado->tipo_de_empleado }}
                        </div>
                        <div class="form-group">
                            <strong>Evaluaciones:</strong>
                            {{ $empleado->evaluaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Dc3:</strong>
                            {{ $empleado->dc3 }}
                        </div>
                        <div class="form-group">
                            <strong>Clims:</strong>
                            {{ $empleado->clims }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Ingreso:</strong>
                            {{ $empleado->fecha_ingreso }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Baja:</strong>
                            {{ $empleado->fecha_baja }}
                        </div>
                        <div class="form-group">
                            <strong>Nuevo Ingreso Reingreso:</strong>
                            {{ $empleado->nuevo_ingreso_reingreso }}
                        </div>
                        <div class="form-group">
                            <strong>Campamento:</strong>
                            {{ $empleado->campamento }}
                        </div>
                        <div class="form-group">
                            <strong>Identificacion Oficial:</strong>
                            {{ $empleado->identificacion_oficial }}
                        </div>
                        <div class="form-group">
                            <strong>Curp:</strong>
                            {{ $empleado->curp }}
                        </div>
                        <div class="form-group">
                            <strong>Rfc:</strong>
                            {{ $empleado->rfc }}
                        </div>
                        <div class="form-group">
                            <strong>Domicilio:</strong>
                            {{ $empleado->domicilio }}
                        </div>
                        <div class="form-group">
                            <strong>Nss:</strong>
                            {{ $empleado->nss }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $empleado->fecha_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Lugar Nacimiento:</strong>
                            {{ $empleado->lugar_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Residencia:</strong>
                            {{ $empleado->residencia }}
                        </div>
                        <div class="form-group">
                            <strong>Vacunas Covid:</strong>
                            {{ $empleado->vacunas_covid }}
                        </div>
                        <div class="form-group">
                            <strong>Licencia Conducir:</strong>
                            {{ $empleado->licencia_conducir }}
                        </div>
                        <div class="form-group">
                            <strong>Carta Antecedentes:</strong>
                            {{ $empleado->carta_antecedentes }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Civil:</strong>
                            {{ $empleado->estado_civil }}
                        </div>
                        <div class="form-group">
                            <strong>Nivel Estudios:</strong>
                            {{ $empleado->nivel_estudios }}
                        </div>
                        <div class="form-group">
                            <strong>Infonavit:</strong>
                            {{ $empleado->infonavit }}
                        </div>
                        <div class="form-group">
                            <strong>Fonacot:</strong>
                            {{ $empleado->fonacot }}
                        </div>
                        <div class="form-group">
                            <strong>Cuenta Bancaria:</strong>
                            {{ $empleado->cuenta_bancaria }}
                        </div>
                        <div class="form-group">
                            <strong>Contacto Emergencia:</strong>
                            {{ $empleado->contacto_emergencia }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Esposa:</strong>
                            {{ $empleado->nombre_esposa }}
                        </div>
                        <div class="form-group">
                            <strong>No Hijos:</strong>
                            {{ $empleado->no_hijos }}
                        </div>
                        <div class="form-group">
                            <strong>Persona Para Tramites:</strong>
                            {{ $empleado->persona_para_tramites }}
                        </div>
                        <div class="form-group">
                            <strong>Beneficiarios:</strong>
                            {{ $empleado->beneficiarios }}
                        </div>
                        <div class="form-group">
                            <strong>Porcentaje:</strong>
                            {{ $empleado->porcentaje }}
                        </div>
                        <div class="form-group">
                            <strong>Domicilio Real:</strong>
                            {{ $empleado->domicilio_real }}
                        </div>
                        <div class="form-group">
                            <strong>Domicilio Alterno:</strong>
                            {{ $empleado->domicilio_alterno }}
                        </div>
                        <div class="form-group">
                            <strong>Talla Camisa:</strong>
                            {{ $empleado->talla_camisa }}
                        </div>
                        <div class="form-group">
                            <strong>Talla Pantalon:</strong>
                            {{ $empleado->talla_pantalon }}
                        </div>
                        <div class="form-group">
                            <strong>Talla Calzado:</strong>
                            {{ $empleado->talla_calzado }}
                        </div>
                        <div class="form-group">
                            <strong>Enfermedades:</strong>
                            {{ $empleado->enfermedades }}
                        </div>
                        <div class="form-group">
                            <strong>Cirugias:</strong>
                            {{ $empleado->cirugias }}
                        </div>
                        <div class="form-group">
                            <strong>Alergias:</strong>
                            {{ $empleado->alergias }}
                        </div>
                        <div class="form-group">
                            <strong>Lentes:</strong>
                            {{ $empleado->lentes }}
                        </div>
                        <div class="form-group">
                            <strong>Lesiones:</strong>
                            {{ $empleado->lesiones }}
                        </div>
                        <div class="form-group">
                            <strong>Fumador:</strong>
                            {{ $empleado->fumador }}
                        </div>
                        <div class="form-group">
                            <strong>Practica Deporte:</strong>
                            {{ $empleado->practica_deporte }}
                        </div>
                        <div class="form-group">
                            <strong>Pertenece Club Social:</strong>
                            {{ $empleado->pertenece_club_social }}
                        </div>
                        <div class="form-group">
                            <strong>Pertenece Sindicato:</strong>
                            {{ $empleado->pertenece_sindicato }}
                        </div>
                        <div class="form-group">
                            <strong>Toma Medicamento:</strong>
                            {{ $empleado->toma_medicamento }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Sangre:</strong>
                            {{ $empleado->tipo_sangre }}
                        </div>
                        <div class="form-group">
                            <strong>Peso:</strong>
                            {{ $empleado->peso }}
                        </div>
                        <div class="form-group">
                            <strong>Estatura:</strong>
                            {{ $empleado->estatura }}
                        </div>
                        <div class="form-group">
                            <strong>Imc:</strong>
                            {{ $empleado->imc }}
                        </div>
                        <div class="form-group">
                            <strong>Esta Trabajando:</strong>
                            {{ $empleado->esta_trabajando }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Edito:</strong>
                            {{ $empleado->usuario_edito }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection