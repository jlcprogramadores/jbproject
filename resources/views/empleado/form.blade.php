@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="container">
        {{-- card con datos rqueridos --}}
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datos Minimos requeridos</h5>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('no_empleado') }}
                            <br>
                            {{ Form::text('no_empleado', $empleado->no_empleado, ['class' => 'form-control' . ($errors->has('no_empleado') ? ' is-invalid' : ''), 'placeholder' => 'No Empleado']) }}
                            {!! $errors->first('no_empleado', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('nombre') }}
                            {{ Form::text('nombre', $empleado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('genero') }}
                            {{ Form::select('genero',array('0' => 'Masculino', '1' => 'Femenino', '2'=> 'Otro'), $empleado->genero, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('genero', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('telefono_personal') }}
                            {{ Form::number('telefono_personal', $empleado->telefono_personal, ['class' => 'form-control' . ($errors->has('telefono_personal') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Personal']) }}
                            {!! $errors->first('telefono_personal', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('correo') }}
                            {{ Form::email('correo', $empleado->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                            {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('Fotografía del empleado') }}
                            <label for="fotografia"></label>
                            <input type="file" name="fotografia" size="50">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datos Genrales</h5>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('puesto_id', 'Puesto') }}
                            <br>
                            {{ Form::select('puesto_id', $puesto, $empleado->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona puesto', 'style'=>"width: 75%"]) }}
                            {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class=" col-sm p-1 form-group">
                            {{ Form::label('proyecto_id', 'Proyecto') }}
                            <br>
                            {{ Form::select('proyecto_id', $proyecto, $empleado->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona proyecto',  'style'=>"width: 75%"]) }}
                            {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('nss') }}
                            {{ Form::text('nss', $empleado->nss, ['class' => 'form-control' . ($errors->has('nss') ? ' is-invalid' : ''), 'placeholder' => 'Nss']) }}
                            {!! $errors->first('nss', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('salario_imss') }}
                            {{ Form::text('salario_imss', $empleado->salario_imss, ['class' => 'form-control' . ($errors->has('salario_imss') ? ' is-invalid' : ''), 'placeholder' => 'Salario Imss']) }}
                            {!! $errors->first('salario_imss', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('salario_real') }}
                            {{ Form::text('salario_real', $empleado->salario_real, ['class' => 'form-control' . ($errors->has('salario_real') ? ' is-invalid' : ''), 'placeholder' => 'Salario Real']) }}
                            {!! $errors->first('salario_real', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            
                            {{ Form::label('tipo_de_empleado') }}
                            {{ Form::select('tipo_de_empleado',['Eventual' => 'Eventual', 'Contrato' => 'Contrato'] ,$empleado->tipo_de_empleado, ['class' => 'form-control' . ($errors->has('tipo_de_empleado') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('tipo_de_empleado', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('fecha_ingreso') }}
                            {{ Form::date('fecha_ingreso', $empleado->fecha_ingreso, ['class' => 'form-control' . ($errors->has('fecha_ingreso') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
                            {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('fecha_baja') }}
                            {{ Form::date('fecha_baja', $empleado->fecha_baja, ['class' => 'form-control' . ($errors->has('fecha_baja') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Baja']) }}
                            {!! $errors->first('fecha_baja', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('nuevo_ingreso_reingreso') }}
                            {{ Form::text('Nuevo Ingreso o Reingreso', $empleado->nuevo_ingreso_reingreso, ['class' => 'form-control' . ($errors->has('nuevo_ingreso_reingreso') ? ' is-invalid' : ''), 'placeholder' => 'Nuevo Ingreso Reingreso']) }}
                            {!! $errors->first('nuevo_ingreso_reingreso', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('campamento') }}
                            {{ Form::text('campamento', $empleado->campamento, ['class' => 'form-control' . ($errors->has('campamento') ? ' is-invalid' : ''), 'placeholder' => 'Campamento']) }}
                            {!! $errors->first('campamento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('curp') }}
                            {{ Form::text('curp', $empleado->curp, ['class' => 'form-control' . ($errors->has('curp') ? ' is-invalid' : ''), 'placeholder' => 'Curp']) }}
                            {!! $errors->first('curp', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('rfc') }}
                            {{ Form::text('rfc', $empleado->rfc, ['class' => 'form-control' . ($errors->has('rfc') ? ' is-invalid' : ''), 'placeholder' => 'Rfc']) }}
                            {!! $errors->first('rfc', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('fecha_nacimiento') }}
                            {{ Form::date('fecha_nacimiento', $empleado->fecha_nacimiento, ['class' => 'form-control' . ($errors->has('fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento']) }}
                            {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-sm p-1 form-group">
                            {{ Form::label('domicilio') }}
                            {{ Form::text('domicilio', $empleado->domicilio, ['class' => 'form-control' . ($errors->has('domicilio') ? ' is-invalid' : ''), 'placeholder' => 'Domicilio']) }}
                            {!! $errors->first('domicilio', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('domicilio_alterno') }}
                            {{ Form::text('domicilio_alterno', $empleado->domicilio_alterno, ['class' => 'form-control' . ($errors->has('domicilio_alterno') ? ' is-invalid' : ''), 'placeholder' => 'Domicilio Alterno']) }}
                            {!! $errors->first('domicilio_alterno', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('domicilio_real') }}
                            {{ Form::text('domicilio_real', $empleado->domicilio_real, ['class' => 'form-control' . ($errors->has('domicilio_real') ? ' is-invalid' : ''), 'placeholder' => 'Domicilio Real']) }}
                            {!! $errors->first('domicilio_real', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('lugar_nacimiento') }}
                            {{ Form::text('lugar_nacimiento', $empleado->lugar_nacimiento, ['class' => 'form-control' . ($errors->has('lugar_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Lugar Nacimiento']) }}
                            {!! $errors->first('lugar_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('residencia') }}
                            {{ Form::text('residencia', $empleado->residencia, ['class' => 'form-control' . ($errors->has('residencia') ? ' is-invalid' : ''), 'placeholder' => 'Residencia']) }}
                            {!! $errors->first('residencia', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            <?php 
                                $estado_civil = [
                                    'Soltero(a)' => 'Soltero(a)', 
                                    'Casado(a)' => 'Casado(a)', 
                                    'Unión Libre' => 'Unión Libre',
                                    'Separado(a)' => 'Separado(a)',
                                    'Divorciado(a)' => 'Divorciado(a)',
                                    'Viudo(a)' => 'Viudo(a)',
                                ];
                            ?>
                            {{ Form::label('estado_civil') }}
                            {{ Form::select('estado_civil', $estado_civil,null ,['class' => 'form-select'. ($errors->has('estado_civil') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('estado_civil', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            <?php 
                                $nivel_estudios = [
                                    'Primaria' => 'Primaria', 
                                    'Secundaria' => 'Secundaria', 
                                    'Preparatoria' => 'Preparatoria',
                                    'Licenciatura' => 'Licenciatura',
                                    'Maestría' => 'Maestría',
                                    'Doctorado' => 'Doctorado',
                                    'Ninguno' => 'Ninguno',
                                ];
                            ?>
                            {{ Form::label('nivel_estudios') }}
                            {{ Form::select('nivel_estudios', $nivel_estudios,null ,['class' => 'form-select'. ($errors->has('nivel_estudios') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('nivel_estudios', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('nombre esposa(o)') }}
                            {{ Form::text('nombre_esposa', $empleado->nombre_esposa, ['class' => 'form-control' . ($errors->has('nombre_esposa') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Esposa(o)']) }}
                            {!! $errors->first('nombre_esposa', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('no_hijos') }}
                            {{ Form::number('no_hijos', $empleado->no_hijos, ['class' => 'form-control' . ($errors->has('no_hijos') ? ' is-invalid' : ''), 'placeholder' => 'No Hijos']) }}
                            {!! $errors->first('no_hijos', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('persona_para_tramites') }}
                            {{ Form::text('persona_para_tramites', $empleado->persona_para_tramites, ['class' => 'form-control' . ($errors->has('persona_para_tramites') ? ' is-invalid' : ''), 'placeholder' => 'Persona Para Tramites']) }}
                            {!! $errors->first('persona_para_tramites', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('beneficiarios') }}
                            {{ Form::text('beneficiarios', $empleado->beneficiarios, ['class' => 'form-control' . ($errors->has('beneficiarios') ? ' is-invalid' : ''), 'placeholder' => 'Beneficiarios']) }}
                            {!! $errors->first('beneficiarios', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('porcentaje') }}
                            {{ Form::text('porcentaje', $empleado->porcentaje, ['class' => 'form-control' . ($errors->has('porcentaje') ? ' is-invalid' : ''), 'placeholder' => 'Porcentaje']) }}
                            {!! $errors->first('porcentaje', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <br>
                    <h5 class="card-title">Datos Complementarios</h5>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('evaluaciones') }}
                            {{ Form::text('evaluaciones', $empleado->evaluaciones, ['class' => 'form-control' . ($errors->has('evaluaciones') ? ' is-invalid' : ''), 'placeholder' => 'Evaluaciones']) }}
                            {!! $errors->first('evaluaciones', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('dc3') }}
                            {{ Form::text('dc3', $empleado->dc3, ['class' => 'form-control' . ($errors->has('dc3') ? ' is-invalid' : ''), 'placeholder' => 'Dc3']) }}
                            {!! $errors->first('dc3', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('clims') }}
                            {{ Form::text('clims', $empleado->clims, ['class' => 'form-control' . ($errors->has('clims') ? ' is-invalid' : ''), 'placeholder' => 'Clims']) }}
                            {!! $errors->first('clims', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('identificacion_oficial') }}
                            {{ Form::text('identificacion_oficial', $empleado->identificacion_oficial, ['class' => 'form-control' . ($errors->has('identificacion_oficial') ? ' is-invalid' : ''), 'placeholder' => 'Identificacion Oficial']) }}
                            {!! $errors->first('identificacion_oficial', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('vacunas_covid') }}
                            {{ Form::text('vacunas_covid', $empleado->vacunas_covid, ['class' => 'form-control' . ($errors->has('vacunas_covid') ? ' is-invalid' : ''), 'placeholder' => 'Vacunas Covid']) }}
                            {!! $errors->first('vacunas_covid', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('licencia_conducir') }}
                            {{ Form::text('licencia_conducir', $empleado->licencia_conducir, ['class' => 'form-control' . ($errors->has('licencia_conducir') ? ' is-invalid' : ''), 'placeholder' => 'Licencia Conducir']) }}
                            {!! $errors->first('licencia_conducir', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('carta_antecedentes') }}
                            {{ Form::text('carta_antecedentes', $empleado->carta_antecedentes, ['class' => 'form-control' . ($errors->has('carta_antecedentes') ? ' is-invalid' : ''), 'placeholder' => 'Carta Antecedentes']) }}
                            {!! $errors->first('carta_antecedentes', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('infonavit') }}
                            {{ Form::text('infonavit', $empleado->infonavit, ['class' => 'form-control' . ($errors->has('infonavit') ? ' is-invalid' : ''), 'placeholder' => 'Infonavit']) }}
                            {!! $errors->first('infonavit', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('fonacot') }}
                            {{ Form::text('fonacot', $empleado->fonacot, ['class' => 'form-control' . ($errors->has('fonacot') ? ' is-invalid' : ''), 'placeholder' => 'Fonacot']) }}
                            {!! $errors->first('fonacot', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('cuenta_bancaria') }}
                            {{ Form::text('cuenta_bancaria', $empleado->cuenta_bancaria, ['class' => 'form-control' . ($errors->has('cuenta_bancaria') ? ' is-invalid' : ''), 'placeholder' => 'Cuenta Bancaria']) }}
                            {!! $errors->first('cuenta_bancaria', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('contacto_emergencia') }}
                            {{ Form::text('contacto_emergencia', $empleado->contacto_emergencia, ['class' => 'form-control' . ($errors->has('contacto_emergencia') ? ' is-invalid' : ''), 'placeholder' => 'Contacto Emergencia']) }}
                            {!! $errors->first('contacto_emergencia', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <?php 
                            $talla_camisa = [
                                'XS' => 'XS', 
                                'S' => 'S', 
                                'M' => 'M',
                                'L' => 'L',
                                'XL' => 'XL',
                                'XXL' => 'XXL',
                                'XXXL' => 'XXXL',
                            ];
                        ?>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('talla_camisa') }}
                            {{ Form::select('talla_camisa', $talla_camisa,null ,['class' => 'form-select'. ($errors->has('talla_camisa') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('talla_camisa', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('talla_pantalon') }}
                            {{ Form::text('talla_pantalon', $empleado->talla_pantalon, ['class' => 'form-control' . ($errors->has('talla_pantalon') ? ' is-invalid' : ''), 'placeholder' => 'Talla Pantalon']) }}
                            {!! $errors->first('talla_pantalon', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            <?php 
                            $talla_calzado = [
                                '20' => '20 cm', 
                                '20.5' => '20.5 cm',
                                '21' => '21 cm',
                                '21.5' => '21.5 cm',
                                '22' => '22 cm',
                                '22.5' => '22.5 cm',
                                '23' => '23 cm',
                                '23.5' => '23.5 cm',
                                '24' => '24 cm',
                                '24.5' => '24.5 cm',
                                '25' => '25 cm',
                                '25.5' => '25.5 cm',
                                '26' => '26 cm',
                                '26.5' => '26.5 cm',
                                '27' => '27 cm',
                                '27.5' => '27.5 cm',
                                '28' => '28 cm',
                                '28.5' => '28.5 cm',
                                '29' => '29 cm',
                                '29.5' => '29.5 cm',
                                '30' => '30 cm',
                                '30.5' => '30.5 cm',
                                '31' => '31 cm'
                            ];
                            ?>
                            {{ Form::label('talla_calzado') }}
                            {{ Form::select('talla_calzado', $talla_calzado,null ,['class' => 'form-select'. ($errors->has('talla_calzado') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('talla_calzado', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('enfermedades') }}
                            {{ Form::text('enfermedades', $empleado->enfermedades, ['class' => 'form-control' . ($errors->has('enfermedades') ? ' is-invalid' : ''), 'placeholder' => 'Enfermedades']) }}
                            {!! $errors->first('enfermedades', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('cirugias') }}
                            {{ Form::text('cirugias', $empleado->cirugias, ['class' => 'form-control' . ($errors->has('cirugias') ? ' is-invalid' : ''), 'placeholder' => 'Cirugias']) }}
                            {!! $errors->first('cirugias', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('alergias') }}
                            {{ Form::text('alergias', $empleado->alergias, ['class' => 'form-control' . ($errors->has('alergias') ? ' is-invalid' : ''), 'placeholder' => 'Alergias']) }}
                            {!! $errors->first('alergias', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('lentes') }}
                            {{ Form::text('lentes', $empleado->lentes, ['class' => 'form-control' . ($errors->has('lentes') ? ' is-invalid' : ''), 'placeholder' => 'Lentes']) }}
                            {!! $errors->first('lentes', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('lesiones') }}
                            {{ Form::text('lesiones', $empleado->lesiones, ['class' => 'form-control' . ($errors->has('lesiones') ? ' is-invalid' : ''), 'placeholder' => 'Lesiones']) }}
                            {!! $errors->first('lesiones', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
        
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('fumador') }}
                            {{ Form::select('fumador',array('0' => 'No', '1' => 'Si'), $empleado->fumador, ['class' => 'form-control' . ($errors->has('fumador') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('fumador', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <?php 
                        $practica_deporte = [
                                '0' => 'Futból', 
                                '1' => 'Natación',
                                '2' => 'Voleibol',
                                '3' => 'Basketball',
                                '4' => 'Beisbol',
                                '5' => 'Deportes de combate (boxeo, taekwondo, judo, etc.)',
                                '6' => 'No práctica deporte',
                            ];
                            ?>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('practica_deporte') }}
                            {{ Form::select('practica_deporte', $practica_deporte,null , ['class' => 'form-control' . ($errors->has('practica_deporte') ? ' is-invalid' : ''), 'placeholder' => 'Practica Deporte']) }}
                            {!! $errors->first('practica_deporte', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('pertenece_club_social') }}
                            {{ Form::text('pertenece_club_social', $empleado->pertenece_club_social, ['class' => 'form-control' . ($errors->has('pertenece_club_social') ? ' is-invalid' : ''), 'placeholder' => 'Pertenece Club Social']) }}
                            {!! $errors->first('pertenece_club_social', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('pertenece_sindicato') }}
                            {{ Form::text('pertenece_sindicato', $empleado->pertenece_sindicato, ['class' => 'form-control' . ($errors->has('pertenece_sindicato') ? ' is-invalid' : ''), 'placeholder' => 'Pertenece Sindicato']) }}
                            {!! $errors->first('pertenece_sindicato', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('toma_medicamento') }}
                            {{ Form::text('toma_medicamento', $empleado->toma_medicamento, ['class' => 'form-control' . ($errors->has('toma_medicamento') ? ' is-invalid' : ''), 'placeholder' => 'Toma Medicamento']) }}
                            {!! $errors->first('toma_medicamento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            <?php 
                                $tipo_sangre = [
                                    'AB +' => 'AB +', 
                                    'AB -' => 'AB -', 
                                    'A +' => 'A +',
                                    'A -' => 'A -',
                                    'B +' => 'B +',
                                    'B -' => 'B -',
                                    'O +' => 'O +',
                                    'O -' => 'O -',
                                ];
                            ?>
                            {{ Form::label('tipo_sangre') }}
                            {{ Form::select('tipo_sangre', $tipo_sangre,null ,['class' => 'form-select'. ($errors->has('tipo_sangre') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('tipo_sangre', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('peso') }}
                            {{ Form::text('peso', $empleado->peso, ['class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso']) }}
                            {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('estatura') }}
                            {{ Form::text('estatura', $empleado->estatura, ['class' => 'form-control' . ($errors->has('estatura') ? ' is-invalid' : ''), 'placeholder' => 'Estatura']) }}
                            {!! $errors->first('estatura', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('imc') }}
                            {{ Form::text('imc', $empleado->imc, ['class' => 'form-control' . ($errors->has('imc') ? ' is-invalid' : ''), 'placeholder' => 'Imc']) }}
                            {!! $errors->first('imc', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm p-1 form-group">
                            {{ Form::label('esta_trabajando') }}
                            {{ Form::select('esta_trabajando',array('0' => 'No', '1' => 'Si') , $empleado->esta_trabajando, ['class' => 'form-control' . ($errors->has('esta_trabajando') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('esta_trabajando', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group d-none">
                            {{ Form::label('usuario_edito') }}
                            {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
                            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
        <div class="container">
            <div class="row justify-content-md-center">
                <br>
                <a href="{{ route('empleados.index') }}" class="btn btn-danger col col-lg-3">{{ __('Cancelar')}}</a>
                <br>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-lg-3">Aceptar</button>
            </div>
        </div>
</div>
@endif
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#proyecto_id').select2();
        $('#puesto_id').select2();
        $('#talla_calzado').select2();
        $('#talla_camisa').select2();
        $('#tipo_sangre').select2();
        $('#nivel_estudios').select2();
        $('#estado_civil').select2();
    </script>
@endpush