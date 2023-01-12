<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
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
    <div>
        <label>Empleado</label>
        <input type="button" name="answer" value="Añadir"  class="btn btn-success btn-sm" onclick="mostrarDiv()" />
        <div id="apartadoEmpleado"  style="display:none;">
            <br>
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Empleado</th>
                    <th>Puesto</th>
                    <th>Salario</th>
                    <th>Acción</th>
                </tr>
                <tr>
                    <td><select id="empleado_id" type="text" style="width: auto;" name="empleado[0][empleado_id]" class="form-control" required/>></select></td> 
                    <td><select id="puesto_id" type="text" style="width: auto;" name="empleado[0][puesto_id]" class="form-control" required/>></select></td> 
                    <td><input id="salario" type="number"  step="any" name="empleado[0][salario]" class="form-control"/></td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Añadir</button></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="box-footer mt20">
        <br>
        <a href="{{ route('grupos.index') }}" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var i = 0;
    var marcador = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            ++marcador;
            $("#dynamicAddRemove").append(
                
                '<tr>'+
                    '<td><select id="empleado_id'+i+'" type="text" name="empleado['+i+'][empleado_id]" style="width: auto;" class="form-control" required/></select></td>'+
                    '<td><select id="puesto_id'+i+'" type="text" name="empleado['+i+'][puesto_id]" style="width: auto;" class="form-control" required /></select></td>'+
                    '<td><input type="number" step="any" name="empleado['+i+'][salario]" class="form-control" required /></td>'+
                    '<td><button type="button" class="btn btn-outline-danger remove-input-field">Borrar</button></td>'+
                '</tr>'
                );
                llenar();
            if(i != 0){
                comprobante = document.getElementById('comprobante');
                comprobante.value = null;
                comprobante.style.display = 'none';
                comprobante = document.getElementById('textComprobante');
                comprobante.value = null;
                comprobante.style.display = 'none';   
            }
        });
        
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

        $(document).on('click', '.remove-input-field', function () {
            --i;
            --marcador;
            $(this).parents('tr').remove();
            if(i == 0){
                comprobante = document.getElementById('comprobante');
                comprobante.style.display = 'block';
                comprobante = document.getElementById('textComprobante');
                comprobante.style.display = 'block';
            }
        });

    function mostrarDiv() {
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
                
        var apartadoEmpleado = document.getElementById('apartadoEmpleado');
        if (apartadoEmpleado.style.display === "none") {
            
            apartadoEmpleado.style.display = "block";
            document.getElementById('empleado_id').required = true;
            document.getElementById('puesto_id').required = true;
            document.getElementById('salario').required = true;
        } else {
            apartadoEmpleado.style.display = "none";
            document.getElementById('empleado_id').required = false;
            document.getElementById('puesto_id').required = false;
            document.getElementById('salario').required = false;
        }
    }
</script>
@endpush