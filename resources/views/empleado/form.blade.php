@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proyecto_id', 'Proyecto') }}
            {{ Form::select('proyecto_id', $proyecto, $empleado->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona proyecto']) }}
            {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('puesto_id', 'Puesto') }}
            {{ Form::select('puesto_id', $puesto, $empleado->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona puesto']) }}
            {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('no_empleado') }}
            {{ Form::text('no_empleado', $empleado->no_empleado, ['class' => 'form-control' . ($errors->has('no_empleado') ? ' is-invalid' : ''), 'placeholder' => 'No Empleado']) }}
            {!! $errors->first('no_empleado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellido_materno') }}
            {{ Form::text('apellido_materno', $empleado->apellido_materno, ['class' => 'form-control' . ($errors->has('apellido_materno') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Materno']) }}
            {!! $errors->first('apellido_materno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellido_paterno') }}
            {{ Form::text('apellido_paterno', $empleado->apellido_paterno, ['class' => 'form-control' . ($errors->has('apellido_paterno') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Paterno']) }}
            {!! $errors->first('apellido_paterno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $empleado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('genero') }}
            {{ Form::text('genero', $empleado->genero, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : ''), 'placeholder' => 'Genero']) }}
            {!! $errors->first('genero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono_personal') }}
            {{ Form::number('telefono_personal', $empleado->telefono_personal, ['class' => 'form-control' . ($errors->has('telefono_personal') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Personal']) }}
            {!! $errors->first('telefono_personal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('correo') }}
            {{ Form::text('correo', $empleado->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
            {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('salario_imss') }}
            {{ Form::text('salario_imss', $empleado->salario_imss, ['class' => 'form-control' . ($errors->has('salario_imss') ? ' is-invalid' : ''), 'placeholder' => 'Salario Imss']) }}
            {!! $errors->first('salario_imss', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('salario_real') }}
            {{ Form::text('salario_real', $empleado->salario_real, ['class' => 'form-control' . ($errors->has('salario_real') ? ' is-invalid' : ''), 'placeholder' => 'Salario Real']) }}
            {!! $errors->first('salario_real', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_de_empleado') }}
            {{ Form::text('tipo_de_empleado', $empleado->tipo_de_empleado, ['class' => 'form-control' . ($errors->has('tipo_de_empleado') ? ' is-invalid' : ''), 'placeholder' => 'Tipo De Empleado']) }}
            {!! $errors->first('tipo_de_empleado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('evaluaciones') }}
            {{ Form::text('evaluaciones', $empleado->evaluaciones, ['class' => 'form-control' . ($errors->has('evaluaciones') ? ' is-invalid' : ''), 'placeholder' => 'Evaluaciones']) }}
            {!! $errors->first('evaluaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dc3') }}
            {{ Form::text('dc3', $empleado->dc3, ['class' => 'form-control' . ($errors->has('dc3') ? ' is-invalid' : ''), 'placeholder' => 'Dc3']) }}
            {!! $errors->first('dc3', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clims') }}
            {{ Form::text('clims', $empleado->clims, ['class' => 'form-control' . ($errors->has('clims') ? ' is-invalid' : ''), 'placeholder' => 'Clims']) }}
            {!! $errors->first('clims', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_ingreso') }}
            {{ Form::date('fecha_ingreso', $empleado->fecha_ingreso, ['class' => 'form-control' . ($errors->has('fecha_ingreso') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
            {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_baja') }}
            {{ Form::date('fecha_baja', $empleado->fecha_baja, ['class' => 'form-control' . ($errors->has('fecha_baja') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Baja']) }}
            {!! $errors->first('fecha_baja', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nuevo_ingreso_reingreso') }}
            {{ Form::text('nuevo_ingreso_reingreso', $empleado->nuevo_ingreso_reingreso, ['class' => 'form-control' . ($errors->has('nuevo_ingreso_reingreso') ? ' is-invalid' : ''), 'placeholder' => 'Nuevo Ingreso Reingreso']) }}
            {!! $errors->first('nuevo_ingreso_reingreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('campamento') }}
            {{ Form::text('campamento', $empleado->campamento, ['class' => 'form-control' . ($errors->has('campamento') ? ' is-invalid' : ''), 'placeholder' => 'Campamento']) }}
            {!! $errors->first('campamento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('identificacion_oficial') }}
            {{ Form::text('identificacion_oficial', $empleado->identificacion_oficial, ['class' => 'form-control' . ($errors->has('identificacion_oficial') ? ' is-invalid' : ''), 'placeholder' => 'Identificacion Oficial']) }}
            {!! $errors->first('identificacion_oficial', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('curp') }}
            {{ Form::text('curp', $empleado->curp, ['class' => 'form-control' . ($errors->has('curp') ? ' is-invalid' : ''), 'placeholder' => 'Curp']) }}
            {!! $errors->first('curp', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rfc') }}
            {{ Form::text('rfc', $empleado->rfc, ['class' => 'form-control' . ($errors->has('rfc') ? ' is-invalid' : ''), 'placeholder' => 'Rfc']) }}
            {!! $errors->first('rfc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('domicilio') }}
            {{ Form::text('domicilio', $empleado->domicilio, ['class' => 'form-control' . ($errors->has('domicilio') ? ' is-invalid' : ''), 'placeholder' => 'Domicilio']) }}
            {!! $errors->first('domicilio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nss') }}
            {{ Form::text('nss', $empleado->nss, ['class' => 'form-control' . ($errors->has('nss') ? ' is-invalid' : ''), 'placeholder' => 'Nss']) }}
            {!! $errors->first('nss', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_nacimiento') }}
            {{ Form::date('fecha_nacimiento', $empleado->fecha_nacimiento, ['class' => 'form-control' . ($errors->has('fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento']) }}
            {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lugar_nacimiento') }}
            {{ Form::text('lugar_nacimiento', $empleado->lugar_nacimiento, ['class' => 'form-control' . ($errors->has('lugar_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Lugar Nacimiento']) }}
            {!! $errors->first('lugar_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('residencia') }}
            {{ Form::text('residencia', $empleado->residencia, ['class' => 'form-control' . ($errors->has('residencia') ? ' is-invalid' : ''), 'placeholder' => 'Residencia']) }}
            {!! $errors->first('residencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('vacunas_covid') }}
            {{ Form::text('vacunas_covid', $empleado->vacunas_covid, ['class' => 'form-control' . ($errors->has('vacunas_covid') ? ' is-invalid' : ''), 'placeholder' => 'Vacunas Covid']) }}
            {!! $errors->first('vacunas_covid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('licencia_conducir') }}
            {{ Form::text('licencia_conducir', $empleado->licencia_conducir, ['class' => 'form-control' . ($errors->has('licencia_conducir') ? ' is-invalid' : ''), 'placeholder' => 'Licencia Conducir']) }}
            {!! $errors->first('licencia_conducir', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('carta_antecedentes') }}
            {{ Form::text('carta_antecedentes', $empleado->carta_antecedentes, ['class' => 'form-control' . ($errors->has('carta_antecedentes') ? ' is-invalid' : ''), 'placeholder' => 'Carta Antecedentes']) }}
            {!! $errors->first('carta_antecedentes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado_civil') }}
            {{ Form::text('estado_civil', $empleado->estado_civil, ['class' => 'form-control' . ($errors->has('estado_civil') ? ' is-invalid' : ''), 'placeholder' => 'Estado Civil']) }}
            {!! $errors->first('estado_civil', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nivel_estudios') }}
            {{ Form::text('nivel_estudios', $empleado->nivel_estudios, ['class' => 'form-control' . ($errors->has('nivel_estudios') ? ' is-invalid' : ''), 'placeholder' => 'Nivel Estudios']) }}
            {!! $errors->first('nivel_estudios', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('infonavit') }}
            {{ Form::text('infonavit', $empleado->infonavit, ['class' => 'form-control' . ($errors->has('infonavit') ? ' is-invalid' : ''), 'placeholder' => 'Infonavit']) }}
            {!! $errors->first('infonavit', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fonacot') }}
            {{ Form::text('fonacot', $empleado->fonacot, ['class' => 'form-control' . ($errors->has('fonacot') ? ' is-invalid' : ''), 'placeholder' => 'Fonacot']) }}
            {!! $errors->first('fonacot', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cuenta_bancaria') }}
            {{ Form::text('cuenta_bancaria', $empleado->cuenta_bancaria, ['class' => 'form-control' . ($errors->has('cuenta_bancaria') ? ' is-invalid' : ''), 'placeholder' => 'Cuenta Bancaria']) }}
            {!! $errors->first('cuenta_bancaria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contacto_emergencia') }}
            {{ Form::text('contacto_emergencia', $empleado->contacto_emergencia, ['class' => 'form-control' . ($errors->has('contacto_emergencia') ? ' is-invalid' : ''), 'placeholder' => 'Contacto Emergencia']) }}
            {!! $errors->first('contacto_emergencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_esposa') }}
            {{ Form::text('nombre_esposa', $empleado->nombre_esposa, ['class' => 'form-control' . ($errors->has('nombre_esposa') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Esposa']) }}
            {!! $errors->first('nombre_esposa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('no_hijos') }}
            {{ Form::number('no_hijos', $empleado->no_hijos, ['class' => 'form-control' . ($errors->has('no_hijos') ? ' is-invalid' : ''), 'placeholder' => 'No Hijos']) }}
            {!! $errors->first('no_hijos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('persona_para_tramites') }}
            {{ Form::text('persona_para_tramites', $empleado->persona_para_tramites, ['class' => 'form-control' . ($errors->has('persona_para_tramites') ? ' is-invalid' : ''), 'placeholder' => 'Persona Para Tramites']) }}
            {!! $errors->first('persona_para_tramites', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('beneficiarios') }}
            {{ Form::text('beneficiarios', $empleado->beneficiarios, ['class' => 'form-control' . ($errors->has('beneficiarios') ? ' is-invalid' : ''), 'placeholder' => 'Beneficiarios']) }}
            {!! $errors->first('beneficiarios', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('porcentaje') }}
            {{ Form::text('porcentaje', $empleado->porcentaje, ['class' => 'form-control' . ($errors->has('porcentaje') ? ' is-invalid' : ''), 'placeholder' => 'Porcentaje']) }}
            {!! $errors->first('porcentaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('domicilio_real') }}
            {{ Form::text('domicilio_real', $empleado->domicilio_real, ['class' => 'form-control' . ($errors->has('domicilio_real') ? ' is-invalid' : ''), 'placeholder' => 'Domicilio Real']) }}
            {!! $errors->first('domicilio_real', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('domicilio_alterno') }}
            {{ Form::text('domicilio_alterno', $empleado->domicilio_alterno, ['class' => 'form-control' . ($errors->has('domicilio_alterno') ? ' is-invalid' : ''), 'placeholder' => 'Domicilio Alterno']) }}
            {!! $errors->first('domicilio_alterno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('talla_camisa') }}
            {{ Form::text('talla_camisa', $empleado->talla_camisa, ['class' => 'form-control' . ($errors->has('talla_camisa') ? ' is-invalid' : ''), 'placeholder' => 'Talla Camisa']) }}
            {!! $errors->first('talla_camisa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('talla_pantalon') }}
            {{ Form::text('talla_pantalon', $empleado->talla_pantalon, ['class' => 'form-control' . ($errors->has('talla_pantalon') ? ' is-invalid' : ''), 'placeholder' => 'Talla Pantalon']) }}
            {!! $errors->first('talla_pantalon', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('talla_calzado') }}
            {{ Form::text('talla_calzado', $empleado->talla_calzado, ['class' => 'form-control' . ($errors->has('talla_calzado') ? ' is-invalid' : ''), 'placeholder' => 'Talla Calzado']) }}
            {!! $errors->first('talla_calzado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('enfermedades') }}
            {{ Form::text('enfermedades', $empleado->enfermedades, ['class' => 'form-control' . ($errors->has('enfermedades') ? ' is-invalid' : ''), 'placeholder' => 'Enfermedades']) }}
            {!! $errors->first('enfermedades', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cirugias') }}
            {{ Form::text('cirugias', $empleado->cirugias, ['class' => 'form-control' . ($errors->has('cirugias') ? ' is-invalid' : ''), 'placeholder' => 'Cirugias']) }}
            {!! $errors->first('cirugias', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('alergias') }}
            {{ Form::text('alergias', $empleado->alergias, ['class' => 'form-control' . ($errors->has('alergias') ? ' is-invalid' : ''), 'placeholder' => 'Alergias']) }}
            {!! $errors->first('alergias', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lentes') }}
            {{ Form::text('lentes', $empleado->lentes, ['class' => 'form-control' . ($errors->has('lentes') ? ' is-invalid' : ''), 'placeholder' => 'Lentes']) }}
            {!! $errors->first('lentes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lesiones') }}
            {{ Form::text('lesiones', $empleado->lesiones, ['class' => 'form-control' . ($errors->has('lesiones') ? ' is-invalid' : ''), 'placeholder' => 'Lesiones']) }}
            {!! $errors->first('lesiones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('fumador') }}
            {{ Form::select('fumador',array('0' => 'No', '1' => 'Si'), $empleado->fumador, ['class' => 'form-control' . ($errors->has('fumador') ? ' is-invalid' : '')]) }}
            {!! $errors->first('fumador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('practica_deporte') }}
            {{ Form::text('practica_deporte', $empleado->practica_deporte, ['class' => 'form-control' . ($errors->has('practica_deporte') ? ' is-invalid' : ''), 'placeholder' => 'Practica Deporte']) }}
            {!! $errors->first('practica_deporte', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pertenece_club_social') }}
            {{ Form::text('pertenece_club_social', $empleado->pertenece_club_social, ['class' => 'form-control' . ($errors->has('pertenece_club_social') ? ' is-invalid' : ''), 'placeholder' => 'Pertenece Club Social']) }}
            {!! $errors->first('pertenece_club_social', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pertenece_sindicato') }}
            {{ Form::text('pertenece_sindicato', $empleado->pertenece_sindicato, ['class' => 'form-control' . ($errors->has('pertenece_sindicato') ? ' is-invalid' : ''), 'placeholder' => 'Pertenece Sindicato']) }}
            {!! $errors->first('pertenece_sindicato', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('toma_medicamento') }}
            {{ Form::text('toma_medicamento', $empleado->toma_medicamento, ['class' => 'form-control' . ($errors->has('toma_medicamento') ? ' is-invalid' : ''), 'placeholder' => 'Toma Medicamento']) }}
            {!! $errors->first('toma_medicamento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_sangre') }}
            {{ Form::text('tipo_sangre', $empleado->tipo_sangre, ['class' => 'form-control' . ($errors->has('tipo_sangre') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Sangre']) }}
            {!! $errors->first('tipo_sangre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('peso') }}
            {{ Form::text('peso', $empleado->peso, ['class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso']) }}
            {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estatura') }}
            {{ Form::text('estatura', $empleado->estatura, ['class' => 'form-control' . ($errors->has('estatura') ? ' is-invalid' : ''), 'placeholder' => 'Estatura']) }}
            {!! $errors->first('estatura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imc') }}
            {{ Form::text('imc', $empleado->imc, ['class' => 'form-control' . ($errors->has('imc') ? ' is-invalid' : ''), 'placeholder' => 'Imc']) }}
            {!! $errors->first('imc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('esta_trabajando') }}
            {{ Form::select('esta_trabajando',array('0' => 'No', '1' => 'Si') , $empleado->esta_trabajando, ['class' => 'form-control' . ($errors->has('esta_trabajando') ? ' is-invalid' : '')]) }}
            {!! $errors->first('esta_trabajando', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', Auth::user()->name, $empleado->usuario_edito, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <br>
        <a href="{{ route('empleados.index') }}" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@endif
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#proyecto_id').select2();
        $('#puesto_id').select2();
    </script>
@endpush