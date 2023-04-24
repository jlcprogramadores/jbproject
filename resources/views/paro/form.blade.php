@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Paro</h5>
                        <div class="row">
                            <div class="col-sm p-1 form-group">
                                {{ Form::label('Nombre') }}
                                {{ Form::text('nombre', $paro->nombre, ['class' => 'form-control',  'required' => 'required' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="col-sm p-1 form-group">
                                {{ Form::label('Proyecto') }}
                                {{ Form::select('proyecto_id',$proyecto, $paro->proyecto_id, ['class' => 'form-control', 'id' => 'proyecto_id' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Proyecto']) }}
                                {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm p-1 form-group">
                                <?php $fechaInicio = isset($paro->fecha_inicio) ? Carbon\Carbon::parse($paro->fecha_inicio)->format('Y-m-d') : $paro->fecha_inicio; ?>
                                {{ Form::label('fecha_inicio') }}
                                {{ Form::date('fecha_inicio', $fechaInicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Pago']) }}
                                {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                            </div>
                            <div class="col-sm p-1 form-group">
                                <?php $fechaFin = isset($paro->fecha_fin) ? Carbon\Carbon::parse($paro->fecha_fin)->format('Y-m-d') : $paro->fecha_fin; ?>
                                {{ Form::label('fecha_fin') }}
                                {{ Form::date('fecha_fin', $fechaFin, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Pago']) }}
                                {!! $errors->first('fecha_fin', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="p-1 form-group">
                                {{ Form::label('comentario') }}
                                {{ Form::text('comentario', $paro->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
                                {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Selecciona Grupo</h5>
                        <div class="row">
                            <div class="form-group">
                                {{ Form::label('grupo_id','Grupo') }}
                                {{ Form::select('grupo_id',$grupo, $paro->grupo_id, ['class' => 'form-control',  ($errors->has('grupo_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el Grupo']) }}
                                {!! $errors->first('grupo_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div id="apartadoEmpleado"  style="display:none;">
                                <div class="table-responsive" id="tablaEmpleados">
                                    <table class="table table-bordered table-striped" id="dynamicAddRemove" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Empleado</th>
                                                <th>Puesto</th>
                                                <th>Salario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input id="empleado_id" type="text" name="empleado[0][empleado_id]" class="form-control ancho-select2" readonly></td>
                                                <td><input id="puesto_id" type="text" name="empleado[0][puesto_id]" class="form-control ancho-select2" readonly></td>
                                                <td><input id="salario" type="number" min="0" step="any" name="empleado[0][salario]" class="form-control ancho-select2" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <button type="button" id="anadirEmpleados" onclick="mostrarElemento();" class="btn btn-success col col-sm-4">Añadir Empleados</button>
            </div>
            <br>
            <div class="row" id="anadirAlGrupo"  style="display:none;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Empleados Adicionales</h5>
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-4 p-1 ">
                                <label id="textcantidad">Número De Empleados</label>
                                <input type="number" name="cantidad" id="cantidad" min="1"  class="form-control" value="1">
                            </div>
                            <div class="col-sm-4 p-1 ">
                                <br>
                                <td><input id="btnCargarEmpleados" type="button" name="answer" value="Cargar Empleados"  class="btn btn-success " onclick="llenarTablas()" /></td>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="row justify-content-md-center">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div id="apartadoEmpleadoNuevo"  style="display:none;">
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered table-striped" id="dynamicEmp" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Empleado</th>
                                                <th>Puesto</th>
                                                <th>Salario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><select id="emp_id" type="text"  name="empleadoNuevo[0][emp_id]" class="form-control ancho-select2" ></select></td> 
                                                <td><select id="pst_id" type="text"  name="empleadoNuevo[0][pst_id]" class="form-control ancho-select2" ></select></td> 
                                                <td><input id="sal" type="number" min="0" step="any" name="empleadoNuevo[0][sal]" class="form-control ancho-select2" value="0"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group d-none">
                {{ Form::label('usuario_edito') }}
                {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
                {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('paros.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="habilitarGrupo();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    // mostrar tabla de empleados
    function mostrarElemento() {
        var elemento = document.getElementById('anadirAlGrupo');
        if (elemento.style.display === "none") {
            elemento.style.display = "block";
            document.getElementById('emp_id').required = true;
            document.getElementById('pst_id').required = true;
            document.getElementById('sal').required = true;
            document.getElementById('anadirEmpleados').disabled = true;

        } 
    }
    var cantidadDeEmpleadoNuevo = 0;
    var i = 0;
    var marcador = 0;

    function llenarTablas() {
        document.getElementById("btnCargarEmpleados").disabled = true; 
        // document.getElementById("btnCargarEmpleados").style.display = 'none';  
        var cantidad = document.getElementById('cantidad');
        cantidadDeEmpleadoNuevo = cantidad.value;
        cantidad.setAttribute('readonly', true);
        // imprime a loe empleados 
        // console.log(<?php echo json_encode($empleados)?>);
        var emp_id = <?php echo json_encode($empleados)?>;
        var selectEmpleadoNuevo = document.querySelectorAll('[id=emp_id]');
        selectEmpleadoNuevo.forEach(function (element) {
            // console.log(emp_id);
            var elementoEmpleado = element;
            for(index in emp_id) {
                elementoEmpleado.options[elementoEmpleado.options.length] = new Option(emp_id[index], index);
                $('#emp_id').select2();
            }
        });

        var pst_id = <?php echo json_encode($puestos)?>;
        var selectPuesto = document.querySelectorAll('[id=pst_id]');
        selectPuesto.forEach(function (element) {
            var elementoPuesto = element;
            for(index in pst_id) {
                console.log(elementoPuesto);
                elementoPuesto.options[elementoPuesto.options.length] = new Option(pst_id[index], index);
                $('#pst_id').select2();
            }
        });
        
        for (let indiceEmpleadosNuevos = 1; indiceEmpleadosNuevos < cantidadDeEmpleadoNuevo; indiceEmpleadosNuevos++) {
            ++i;
            ++marcador;
            $("#dynamicEmp").append(        
                '<tr>'+
                    '<td><select id="emp_id'+i+'" type="text" name="empleadoNuevo['+i+'][emp_id]"  class="form-control ancho-select2" required></select></td>'+
                    '<td><select id="pst_id'+i+'" type="text" name="empleadoNuevo['+i+'][pst_id]"  class="form-control ancho-select2" required ></select></td>'+
                    '<td><input type="number" step="any" min="0" name="empleadoNuevo['+i+'][sal]" class="form-control ancho-select2" value="0"></td>'+
                '</tr>'
            );
            llenar(); 
        }
        
 
        var apartadoEmpleadoNuevo = document.getElementById('apartadoEmpleadoNuevo');
        if (apartadoEmpleadoNuevo.style.display === "none") {
            // var btnAceptar = document.getElementById('btnAceptar');
            // btnAceptar.style.display = "inline-block";
            apartadoEmpleadoNuevo.style.display = "block";
            document.getElementById('emp_id').required = true;
            document.getElementById('pst_id').required = true;
            document.getElementById('sal').required = false;
        } else {
            apartadoEmpleadoNuevo.style.display = "none";
            document.getElementById('emp_id').required = false;
            document.getElementById('pst_id').required = false;
            document.getElementById('sal').required = false;
        }
    }

    function llenar() {
        for (let marcadorIndex = 1; marcadorIndex < marcador+1; marcadorIndex++) {
            var emp_id = <?php echo json_encode($empleados)?>;
            var selectEmpleadoNuevo = document.querySelectorAll('[id=emp_id'+marcadorIndex+']');
            selectEmpleadoNuevo.forEach(function (element) {
                var elementoEmpleado = element;
                elementoEmpleado.options.length = 0;
                for(index in emp_id) {
                    elementoEmpleado.options[elementoEmpleado.options.length] = new Option(emp_id[index], index);
                    var cadena = '#emp_id'+marcadorIndex;
                    $('#emp_id').select2();
                    $(cadena).select2();
                }
            });
        }

        for (let marcadorIndex = 1; marcadorIndex < marcador+1; marcadorIndex++) {
            var pst_id = <?php echo json_encode($puestos)?>;
            var selectPuesto = document.querySelectorAll('[id=pst_id'+marcadorIndex+']');
            selectPuesto.forEach(function (element) {
                var elementoPuesto = element;
                elementoPuesto.options.length = 0;
                for(index in pst_id) {
                    elementoPuesto.options[elementoPuesto.options.length] = new Option(pst_id[index], index);
                    var cadena = '#pst_id'+marcadorIndex;
                    $('#pst_id').select2();
                    $(cadena).select2();
                }
            });
        }
        
    }


    // function habilitarGrupoNuevo () {
    //     document.getElementById('cantidad').readOnly = false; 
    // } 

    $('#proyecto_id').select2();
    var iteradorTabla = 0;

    $(document).ready( function () {
        var selectValue = document.getElementById('grupo_id');
        if (selectValue.value) {
            getEmpleadosByGrupo(selectValue.value);
        }   
    });

    var cantidadDeEmpleados = 0;
    $('#grupo_id').select2();
    var mySelect = document.getElementById('grupo_id');
    mySelect.onchange = (event) => {
        
        var inputText = event.target.value;
        // $('#grupo_id').attr('disabled', 'disabled');
        getEmpleadosByGrupo(inputText);
    }

    function getEmpleadosByGrupo(id){
        var iteradorTabla = 0;
        var iterable='';
        $.ajax({
            type:"GET",
            async : false,
            data:{
                'grupo_id':id
            },
            url: "{{ route('grupos.getEmpleadosByGrupo') }}",
            success:function(data){
                iterable = JSON.parse(data);
                return iterable;
            }
        });

        if (iteradorTabla >= 0) {
            for (let iteradorBorrado = 1; iteradorBorrado < cantidadDeEmpleados; iteradorBorrado++) {
                $(('#fila'+iteradorBorrado)).remove();
            }
        }

        cantidadDeEmpleados = iterable.length;
        for (let indiceEmpleados = 1; indiceEmpleados < cantidadDeEmpleados; indiceEmpleados++) {
            ++iteradorTabla;
            $("#dynamicAddRemove").append(        
                '<tr id="fila'+iteradorTabla+'">'+
                    '<td><input id="empleado_id'+iteradorTabla+'" type="text" name="empleado['+iteradorTabla+'][empleado_id]" class="form-control ancho-select2" readonly></td>'+
                    '<td><input id="puesto_id'+iteradorTabla+'" type="text" name="empleado['+iteradorTabla+'][puesto_id]" class="form-control ancho-select2" readonly></td>'+
                    '<td><input id="salario_id'+iteradorTabla+'" type="number" step="any" min="0" name="empleado['+iteradorTabla+'][salario_id]" class="form-control ancho-select2" readonly></td>'+
                '</tr>'
            );
        }
        console.log(iteradorTabla+1);
        var iterador = 0;
        for (let value of iterable) {
            if (iterador == 0) {
                var empleado = document.getElementById('empleado_id');
                empleado.value = value[0]['nombre'];
                var puesto = document.getElementById('puesto_id');
                puesto.value = value[0]['puesto'];
                var salario = document.getElementById('salario');
                salario.value = value[0]['salario']; 
                iterador ++; 
                
            }else{
                var selectEmpleado = document.querySelectorAll('[id=empleado_id'+iterador+']');
                selectEmpleado.forEach(function (element) {
                    var elementoEmpleado2 = element;
                    elementoEmpleado2.value = value[0]['nombre'];
                });
                
                var selectPuesto2 = document.querySelectorAll('[id=puesto_id'+iterador+']');
                selectPuesto2.forEach(function (element) {
                    var elementoEmpleado2 = element;
                    elementoEmpleado2.value = value[0]['puesto'];
                });
                
                var selectSalario = document.querySelectorAll('[id=salario_id'+iterador+']');
                selectSalario.forEach(function (element) {
                    var elementoEmpleado2 = element;
                    elementoEmpleado2.value = value[0]['salario'];
                });
                iterador ++; 
            }
        };
        var apartadoEmpleado = document.getElementById('apartadoEmpleado');
        apartadoEmpleado.style.display = "block";   
        
    }
    
    function habilitarGrupo() {
        $('#grupo_id').removeAttr('disabled');
    }
    
    </script>
@endpush
@endif