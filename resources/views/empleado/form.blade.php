
<div class="box box-info padding-1">
    <div class="container">
        {{-- card con datos rqueridos --}}
        <div class="row">
            <div class="card col">
                <div class="card-body">
                    <h5 class="card-title">Datos Mínimos requeridos</h5>
                    <br>
                    <hr>
                    <div class="row">
                        @if (isset($empleado->no_empleado))
                        <div class="col form-group ">
                            {{ Form::label('no_empleado') }}
                            <span style="color:red">*</span>
                            {{ Form::text('no_empleado', $empleado->no_empleado, ['class' => 'form-control', 'readonly' => 'true'. ($errors->has('no_empleado') ? ' is-invalid' : ''), 'placeholder' => 'No_empleado']) }}
                            {!! $errors->first('no_empleado', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        @else   
                            {{-- <input type="text" value="{{$numEmpleado}}" disabled="true" class="form-control" >
                            <div class="d-none">
                                {{ Form::text('no_empleado', $numEmpleado, $empleado->no_empleado, ['class' => 'form-control' . ($errors->has('no_empleado') ? ' is-invalid' : ''), 'placeholder' => 'No_empleado']) }}
                            </div>   --}}
                        @endif
                            
                        <div class="col form-group">
                            {{ Form::label('nombre') }}
                            <span style="color:red">*</span>
                            {{ Form::text('nombre', $empleado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label(__('genero')) }}
                            <span style="color:red">*</span>
                            {{ Form::select('genero',array('0' => 'Masculino', '1' => 'Femenino', '2'=> 'Otro'), $empleado->genero, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('genero', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('telefono_personal','Teléfono Personal') }}
                            <span style="color:red">*</span>
                            {{ Form::number('telefono_personal', $empleado->telefono_personal, ['class' => 'form-control' . ($errors->has('telefono_personal') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono Personal']) }}
                            {!! $errors->first('telefono_personal', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('correo') }}
                            <span style="color:red">*</span>
                            {{ Form::email('correo', $empleado->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                            {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <h5 class="card-title">Estado Actual de Empleado</h5>
                    <br>
                    <hr>
                    @if ($empleado->nombre)
                        {{-- no contiene nada porque ya es viejo --}}
                        <div class="col-4 form-group d-none">
                            {{ Form::label('esta_trabajando','Estado') }}
                            <span style="color:red">*</span>
                            {{ Form::select('esta_trabajando',['1' => 'Alta', '0' => 'Baja' ] , $empleado->esta_trabajando, ['class' => 'form-control' . ($errors->has('esta_trabajando') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('esta_trabajando', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    @else
                    <div class="row">
                        <div class="col-2 form-group">
                            {{ Form::label('esta_trabajando','Estado') }}
                            <span style="color:red">*</span>
                            {{ Form::select('esta_trabajando',['1' => 'Alta', '0' => 'Baja' ] , $empleado->esta_trabajando, ['class' => 'form-control' . ($errors->has('esta_trabajando') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('esta_trabajando', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('fecha_suceso', 'Fecha Del Suceso') }}
                            <span style="color:red">*</span>
                            {{ Form::date('fecha_suceso',null, ['class' => 'form-control' . ($errors->has('fecha_suceso') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('fecha_suceso', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            <label for="comentario">Comentario</label>
                            <input type="text" name="comentario" id="comentario" class="form-control" placeholder="Comentario">
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="card col">
                <div class="card-body">
                    <h5 class="card-title">Datos Generales</h5>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('puesto_id', 'Puesto') }}
                            <br>
                            {{ Form::select('puesto_id', $puesto, $empleado->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona puesto']) }}
                            {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class=" col form-group">
                            {{ Form::label('proyecto_id', 'Proyecto') }}
                            <br>
                            {{ Form::select('proyecto_id', $proyecto, $empleado->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona proyecto']) }}
                            {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('Fotografía del empleado') }}
                            <input type="file" name="fotografia" size="50" class="form-control">
                        </div>
                        <div class="col form-group">
                            {{ Form::label('nss','NSS') }}
                            {{ Form::text('nss', $empleado->nss, ['class' => 'form-control' . ($errors->has('nss') ? ' is-invalid' : ''), 'placeholder' => 'NSS']) }}
                            {!! $errors->first('nss', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('salario_imss','Salario IMSS') }}
                            {{ Form::number('salario_imss', $empleado->salario_imss, ['class' => 'form-control' . ($errors->has('salario_imss') ? ' is-invalid' : ''),'step'=>'any', 'placeholder' => 'Salario IMSS']) }}
                            {!! $errors->first('salario_imss', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('salario_real') }}
                            {{ Form::number('salario_real', $empleado->salario_real, ['class' => 'form-control' . ($errors->has('salario_real') ? ' is-invalid' : ''),'step'=>'any', 'placeholder' => 'Salario Real']) }}
                            {!! $errors->first('salario_real', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            {{ Form::label('tipo_de_empleado') }}
                            {{ Form::select('tipo_de_empleado',['Eventual' => 'Eventual', 'Contrato' => 'Contrato'] ,$empleado->tipo_de_empleado, ['class' => 'form-control' . ($errors->has('tipo_de_empleado') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('tipo_de_empleado', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('fecha_ingreso') }}
                            {{ Form::date('fecha_ingreso', $empleado->fecha_ingreso, ['class' => 'form-control' . ($errors->has('fecha_ingreso') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
                            {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('fecha_baja') }}
                            {{ Form::date('fecha_baja', $empleado->fecha_baja, ['class' => 'form-control' . ($errors->has('fecha_baja') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Baja']) }}
                            {!! $errors->first('fecha_baja', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('nuevo_ingreso_reingreso','Nuevo Ingreso o Reingreso') }}
                            {{ Form::text('nuevo_ingreso_reingreso', $empleado->nuevo_ingreso_reingreso, ['class' => 'form-control' . ($errors->has('nuevo_ingreso_reingreso') ? ' is-invalid' : ''), 'placeholder' => 'Nuevo Ingreso Reingreso']) }}
                            {!! $errors->first('nuevo_ingreso_reingreso', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('campamento') }}
                            {{ Form::text('campamento', $empleado->campamento, ['class' => 'form-control' . ($errors->has('campamento') ? ' is-invalid' : ''), 'placeholder' => 'Campamento']) }}
                            {!! $errors->first('campamento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('curp','CURP') }}
                            {{ Form::text('curp', $empleado->curp, ['class' => 'form-control' . ($errors->has('curp') ? ' is-invalid' : ''), 'placeholder' => 'CURP']) }}
                            {!! $errors->first('curp', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('rfc', 'RFC') }}
                            {{ Form::text('rfc', $empleado->rfc, ['class' => 'form-control' . ($errors->has('rfc') ? ' is-invalid' : ''), 'placeholder' => 'RFC']) }}
                            {!! $errors->first('rfc', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('fecha_nacimiento') }}
                            {{ Form::date('fecha_nacimiento', $empleado->fecha_nacimiento, ['class' => 'form-control' . ($errors->has('fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento']) }}
                            {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class=" col form-group">
                            {{ Form::label('domicilio') }}
                            {{ Form::text('domicilio', $empleado->domicilio, ['class' => 'form-control' . ($errors->has('domicilio') ? ' is-invalid' : ''), 'placeholder' => 'Domicilio']) }}
                            {!! $errors->first('domicilio', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('domicilio_alterno') }}
                            {{ Form::text('domicilio_alterno', $empleado->domicilio_alterno, ['class' => 'form-control' . ($errors->has('domicilio_alterno') ? ' is-invalid' : ''), 'placeholder' => 'Domicilio Alterno']) }}
                            {!! $errors->first('domicilio_alterno', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('domicilio_real') }}
                            {{ Form::text('domicilio_real', $empleado->domicilio_real, ['class' => 'form-control' . ($errors->has('domicilio_real') ? ' is-invalid' : ''), 'placeholder' => 'Domicilio Real']) }}
                            {!! $errors->first('domicilio_real', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('lugar_nacimiento') }}
                            {{ Form::text('lugar_nacimiento', $empleado->lugar_nacimiento, ['class' => 'form-control' . ($errors->has('lugar_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Lugar Nacimiento']) }}
                            {!! $errors->first('lugar_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('residencia') }}
                            {{ Form::text('residencia', $empleado->residencia, ['class' => 'form-control' . ($errors->has('residencia') ? ' is-invalid' : ''), 'placeholder' => 'Residencia']) }}
                            {!! $errors->first('residencia', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
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
                            <br>
                            {{ Form::select('estado_civil', $estado_civil,null ,['class' => 'form-select'. ($errors->has('estado_civil') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('estado_civil', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
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
                            <br>
                            {{ Form::select('nivel_estudios', $nivel_estudios,null ,['class' => 'form-select'. ($errors->has('nivel_estudios') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('nivel_estudios', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('nombre_esposa','nombre esposa(o)') }}
                            {{ Form::text('nombre_esposa', $empleado->nombre_esposa, ['class' => 'form-control' . ($errors->has('nombre_esposa') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Esposa(o)']) }}
                            {!! $errors->first('nombre_esposa', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('no_hijos') }}
                            {{ Form::number('no_hijos', $empleado->no_hijos, ['class' => 'form-control' . ($errors->has('no_hijos') ? ' is-invalid' : ''), 'placeholder' => 'No Hijos']) }}
                            {!! $errors->first('no_hijos', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('persona_para_tramites') }}
                            {{ Form::text('persona_para_tramites', $empleado->persona_para_tramites, ['class' => 'form-control' . ($errors->has('persona_para_tramites') ? ' is-invalid' : ''), 'placeholder' => 'Persona Para Tramites']) }}
                            {!! $errors->first('persona_para_tramites', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('beneficiarios') }}
                            {{ Form::text('beneficiarios', $empleado->beneficiarios, ['class' => 'form-control' . ($errors->has('beneficiarios') ? ' is-invalid' : ''), 'placeholder' => 'Beneficiarios']) }}
                            {!! $errors->first('beneficiarios', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            {{ Form::label('porcentaje') }}
                            {{ Form::number('porcentaje', $empleado->porcentaje, ['class' => 'form-control' . ($errors->has('porcentaje') ? ' is-invalid' : ''), 'placeholder' => 'Porcentaje']) }}
                            {!! $errors->first('porcentaje', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="card col">
                <div class="card-body">
                    <h5 class="card-title">Datos Complementarios</h5>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('evaluaciones') }}
                            {{ Form::text('evaluaciones', $empleado->evaluaciones, ['class' => 'form-control' . ($errors->has('evaluaciones') ? ' is-invalid' : ''), 'placeholder' => 'Evaluaciones']) }}
                            {!! $errors->first('evaluaciones', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('clims') }}
                            {{ Form::text('clims', $empleado->clims, ['class' => 'form-control' . ($errors->has('clims') ? ' is-invalid' : ''), 'placeholder' => 'Clims']) }}
                            {!! $errors->first('clims', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('identificacion_oficial','Identificación Oficial') }}
                            {{ Form::text('identificacion_oficial', $empleado->identificacion_oficial, ['class' => 'form-control' . ($errors->has('identificacion_oficial') ? ' is-invalid' : ''), 'placeholder' => 'Identificacion Oficial']) }}
                            {!! $errors->first('identificacion_oficial', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('vacunas_covid') }}
                            {{ Form::text('vacunas_covid', $empleado->vacunas_covid, ['class' => 'form-control' . ($errors->has('vacunas_covid') ? ' is-invalid' : ''), 'placeholder' => 'Vacunas Covid']) }}
                            {!! $errors->first('vacunas_covid', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('licencia_conducir') }}
                            {{ Form::text('licencia_conducir', $empleado->licencia_conducir, ['class' => 'form-control' . ($errors->has('licencia_conducir') ? ' is-invalid' : ''), 'placeholder' => 'Licencia Conducir']) }}
                            {!! $errors->first('licencia_conducir', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('carta_antecedentes') }}
                            {{ Form::text('carta_antecedentes', $empleado->carta_antecedentes, ['class' => 'form-control' . ($errors->has('carta_antecedentes') ? ' is-invalid' : ''), 'placeholder' => 'Carta Antecedentes']) }}
                            {!! $errors->first('carta_antecedentes', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('infonavit') }}
                            {{ Form::text('infonavit', $empleado->infonavit, ['class' => 'form-control' . ($errors->has('infonavit') ? ' is-invalid' : ''), 'placeholder' => 'Infonavit']) }}
                            {!! $errors->first('infonavit', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('fonacot') }}
                            {{ Form::text('fonacot', $empleado->fonacot, ['class' => 'form-control' . ($errors->has('fonacot') ? ' is-invalid' : ''), 'placeholder' => 'Fonacot']) }}
                            {!! $errors->first('fonacot', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('cuenta_bancaria') }}
                            {{ Form::text('cuenta_bancaria', $empleado->cuenta_bancaria, ['class' => 'form-control' . ($errors->has('cuenta_bancaria') ? ' is-invalid' : ''), 'placeholder' => 'Cuenta Bancaria']) }}
                            {!! $errors->first('cuenta_bancaria', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('contacto_emergencia') }}
                            {{ Form::text('contacto_emergencia', $empleado->contacto_emergencia, ['class' => 'form-control' . ($errors->has('contacto_emergencia') ? ' is-invalid' : ''), 'placeholder' => 'Contacto Emergencia']) }}
                            {!! $errors->first('contacto_emergencia', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
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
                            {{ Form::label('talla_camisa') }}
                            {{ Form::select('talla_camisa', $talla_camisa,null ,['class' => 'form-select'. ($errors->has('talla_camisa') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('talla_camisa', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            <?php 
                                $talla_pantalon = [
                                    'XS' => 'XS', 
                                    'S' => 'S', 
                                    'M' => 'M',
                                    'L' => 'L',
                                    'XL' => 'XL',
                                    'XXL' => 'XXL',
                                    'XXXL' => 'XXXL',
                                ];
                            ?>
                            {{ Form::label('talla_pantalon','Talla Pantalón') }}
                            {{ Form::select('talla_pantalon',$talla_pantalon,  $empleado->talla_pantalon, ['class' => 'form-control' . ($errors->has('talla_pantalon') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('talla_pantalon', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
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
                        <div class="col form-group">
                            {{ Form::label('enfermedades') }}
                            {{ Form::text('enfermedades', $empleado->enfermedades, ['class' => 'form-control' . ($errors->has('enfermedades') ? ' is-invalid' : ''), 'placeholder' => 'Enfermedades']) }}
                            {!! $errors->first('enfermedades', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('cirugias','Cirugías') }}
                            {{ Form::text('cirugias', $empleado->cirugias, ['class' => 'form-control' . ($errors->has('cirugias') ? ' is-invalid' : ''), 'placeholder' => 'Cirugias']) }}
                            {!! $errors->first('cirugias', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('alergias') }}
                            {{ Form::text('alergias', $empleado->alergias, ['class' => 'form-control' . ($errors->has('alergias') ? ' is-invalid' : ''), 'placeholder' => 'Alergias']) }}
                            {!! $errors->first('alergias', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('lentes') }}
                            {{ Form::text('lentes', $empleado->lentes, ['class' => 'form-control' . ($errors->has('lentes') ? ' is-invalid' : ''), 'placeholder' => 'Lentes']) }}
                            {!! $errors->first('lentes', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('lesiones') }}
                            {{ Form::text('lesiones', $empleado->lesiones, ['class' => 'form-control' . ($errors->has('lesiones') ? ' is-invalid' : ''), 'placeholder' => 'Lesiones']) }}
                            {!! $errors->first('lesiones', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('fumador') }}
                            {{ Form::select('fumador',array('0' => 'No', '1' => 'Si'), $empleado->fumador, ['class' => 'form-control' . ($errors->has('fumador') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('fumador', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <?php 
                        $practica_deporte = [
                            'Futbol' => 'Futbol', 
                            'Natación' => 'Natación',
                            'Voleibol' => 'Voleibol',
                            'Basketball' => 'Basketball',
                            'Béisbol' => 'Béisbol',
                            'Deportes de combate (boxeo, taekwondo, judo, etc.)' => 'Deportes de combate (boxeo, taekwondo, judo, etc.)',
                            'Otro' => 'Otro',
                            'No práctica deporte' => 'No práctica deporte',
                        ];
                            ?>
                        <div class="col form-group">
                            {{ Form::label('practica_deporte') }}
                            {{ Form::select('practica_deporte', $practica_deporte,null , ['class' => 'form-control' . ($errors->has('practica_deporte') ? ' is-invalid' : ''), 'placeholder' => 'Practica Deporte']) }}
                            {!! $errors->first('practica_deporte', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('pertenece_club_social') }}
                            {{ Form::text('pertenece_club_social', $empleado->pertenece_club_social, ['class' => 'form-control' . ($errors->has('pertenece_club_social') ? ' is-invalid' : ''), 'placeholder' => 'Pertenece Club Social']) }}
                            {!! $errors->first('pertenece_club_social', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('pertenece_sindicato') }}
                            {{ Form::text('pertenece_sindicato', $empleado->pertenece_sindicato, ['class' => 'form-control' . ($errors->has('pertenece_sindicato') ? ' is-invalid' : ''), 'placeholder' => 'Pertenece Sindicato']) }}
                            {!! $errors->first('pertenece_sindicato', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('toma_medicamento') }}
                            {{ Form::text('toma_medicamento', $empleado->toma_medicamento, ['class' => 'form-control' . ($errors->has('toma_medicamento') ? ' is-invalid' : ''), 'placeholder' => 'Toma Medicamento']) }}
                            {!! $errors->first('toma_medicamento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
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
                        <div class="col form-group">
                            {{ Form::label('peso','peso (Kg)') }}
                            {{ Form::number('peso', 1, ['class' => 'form-control', 'id'=>'peso' , 'min'=>'1', 'onchange'=>"calculoIMC();" . ($errors->has('peso') ? ' is-invalid' : ''), 'step'=>'any', 'placeholder' => 'Peso']) }}
                            {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{ Form::label('estatura','estatura (cm)') }}
                            {{ Form::number('estatura', 1, ['class' => 'form-control', 'id'=>'estatura', 'min'=>'1', 'onchange'=>"calculoIMC();" . ($errors->has('estatura') ? ' is-invalid' : ''), 'step'=>'any', 'placeholder' => 'Estatura']) }}
                            {!! $errors->first('estatura', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col form-group">
                            {{ Form::label('imc','IMC') }}
                            {{ Form::text('imc', $empleado->imc, ['class' => 'form-control', 'id'=>'imc', 'readonly' => 'true' . ($errors->has('imc') ? ' is-invalid' : ''), 'placeholder' => 'IMC']) }}
                            {!! $errors->first('imc', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group d-none">
                            {{ Form::label('usuario_edito') }}
                            {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
                            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- si es se esta creando el empleado aparece estado actual / se evalúa con un dato requerido si contiene algo o no --}}
        
        <br>
        <div class="row d-flex justify-content-center">
            <a href="{{ route('empleados.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
            <div class="col col-sm-2"></div>
            <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
        </div>
    </div>
</div>
@push('js')
    
    <script>
        $('#proyecto_id').select2();
        $('#puesto_id').select2();
        $('#talla_calzado').select2();
        $('#talla_camisa').select2();
        $('#talla_pantalon').select2();
        $('#tipo_sangre').select2();
        $('#nivel_estudios').select2();
        $('#estado_civil').select2();
        let pesoEstatico = "0";
        let estaturaEstatico = "0";
        function calculoIMC() {
            var peso = document.getElementById('peso');
            var estatura = document.getElementById('estatura');
            if (peso.value) {
                pesoEstatico = peso.value;
            }
            if(estatura.value){
                estaturaEstatico = Math.round(estatura.value) / 100 ;
            }
            calculo = (pesoEstatico / Math.pow(estaturaEstatico, 2));
            
            var total = document.getElementById('imc');
            total.value = calculo.toFixed(2);

        }
    </script>
@endpush