@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 p-1 form-group">
                    <label id="textcantidad">Cantidad de Empleados</label>
                    <input type="number" name="cantidad" id="cantidad" min="1"  class="form-control" value="1">
                </div>  
                <div class="col-sm-10 p-1 form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $grupo->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group d-none">
                    {{ Form::label('usuario_edito') }}
                    {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <br>
            <div class="row justify-content-md-center">
                    <td><input id="btnCargarEmpleados" type="button" name="answer" value="Cargar Empleados"  class="btn btn-success col col-lg-3" onclick="llenarTablas()" /></td>
            </div>
            <br>
            <div class="row">
                <div id="apartadoEmpleado"  style="display:none;">
                    <div class="table-responsive">
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
                                    <td><select id="empleado_id" type="text"  name="empleado[0][empleado_id]" class="form-control ancho-select2" required></select></td> 
                                    <td><select id="puesto_id" type="text"  name="empleado[0][puesto_id]" class="form-control ancho-select2" required></select></td> 
                                    <td><input id="salario" type="number" min="0" step="any" name="empleado[0][salario]" class="form-control ancho-select2" value="0"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('grupos.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>

        </div>

    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var cantidadDeEmpleados = 0;
    var i = 0;
    var marcador = 0;
    
    function llenarTablas() {
        document.getElementById("btnCargarEmpleados").disabled = true;  
        // document.querySelector('#button').disabled = true;
        var cantidad = document.getElementById('cantidad');
        cantidadDeEmpleados = cantidad.value;
        cantidad.setAttribute('readonly', true);
        console.log(<?php echo json_encode($empleados)?>);
        var empleado_id = <?php echo json_encode($empleados)?>;
        var selectEmpleado = document.querySelectorAll('[id=empleado_id]');
        selectEmpleado.forEach(function (element) {
            var elementoEmpleado = element;
            for(index in empleado_id) {
                elementoEmpleado.options[elementoEmpleado.options.length] = new Option(empleado_id[index], index);
                $('#empleado_id').select2();
            }
        });

        var puesto_id = <?php echo json_encode($puestos)?>;
        var selectPuesto = document.querySelectorAll('[id=puesto_id]');
        selectPuesto.forEach(function (element) {
            var elementoPuesto = element;
            for(index in puesto_id) {
                elementoPuesto.options[elementoPuesto.options.length] = new Option(puesto_id[index], index);
                $('#puesto_id').select2();
            }
        });
        
        for (let indiceEmpleados = 1; indiceEmpleados < cantidadDeEmpleados; indiceEmpleados++) {
            ++i;
            ++marcador;
            $("#dynamicAddRemove").append(        
                '<tr>'+
                    '<td><select id="empleado_id'+i+'" type="text" name="empleado['+i+'][empleado_id]"  class="form-control ancho-select2" required></select></td>'+
                    '<td><select id="puesto_id'+i+'" type="text" name="empleado['+i+'][puesto_id]"  class="form-control ancho-select2" required ></select></td>'+
                    '<td><input type="number" step="any" min="0" name="empleado['+i+'][salario]" class="form-control ancho-select2" value="0"></td>'+
                '</tr>'
            );
            llenar(); 
        }
        
 
        var apartadoEmpleado = document.getElementById('apartadoEmpleado');
        if (apartadoEmpleado.style.display === "none") {
            
            apartadoEmpleado.style.display = "block";
            document.getElementById('empleado_id').required = true;
            document.getElementById('puesto_id').required = true;
            document.getElementById('salario').required = false;
        } else {
            apartadoEmpleado.style.display = "none";
            document.getElementById('empleado_id').required = false;
            document.getElementById('puesto_id').required = false;
            document.getElementById('salario').required = false;
        }
    }
        
    function llenar() {
        for (let marcadorIndex = 1; marcadorIndex < marcador+1; marcadorIndex++) {
            var empleado_id = <?php echo json_encode($empleados)?>;
            var selectEmpleado = document.querySelectorAll('[id=empleado_id'+marcadorIndex+']');
            selectEmpleado.forEach(function (element) {
                var elementoEmpleado = element;
                elementoEmpleado.options.length = 0;
                for(index in empleado_id) {
                    elementoEmpleado.options[elementoEmpleado.options.length] = new Option(empleado_id[index], index);
                    var cadena = '#empleado_id'+marcadorIndex;
                    $('#empleado_id').select2();
                    $(cadena).select2();
                }
            });
        }

        for (let marcadorIndex = 1; marcadorIndex < marcador+1; marcadorIndex++) {
            var puesto_id = <?php echo json_encode($puestos)?>;
            var selectPuesto = document.querySelectorAll('[id=puesto_id'+marcadorIndex+']');
            selectPuesto.forEach(function (element) {
                var elementoPuesto = element;
                elementoPuesto.options.length = 0;
                for(index in puesto_id) {
                    elementoPuesto.options[elementoPuesto.options.length] = new Option(puesto_id[index], index);
                    var cadena = '#puesto_id'+marcadorIndex;
                    $('#puesto_id').select2();
                    $(cadena).select2();
                }
            });
        }
        
    }

</script>
@endpush
@endif