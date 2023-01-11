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
                    <td><input id="empleado_id" type="text" name="factura[0][empleado_id]" class="form-control"/></td>
                    <td><input id="puesto_id" type="text" name="factura[0][puesto_id]" class="form-control"/></td>
                    <td><input id="salario" type="number"  step="any" name="factura[0][salario]" class="form-control"/></td>
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
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append(
                '<tr>'+
                     '<td><input type="text" name="factura['+i+'][empleado_id]" class="form-control" required /></td>'+
                     '<td><input type="text" name="factura['+i+'][puesto_id]" class="form-control" required /></td>'+
                     '<td><input type="number" step="any" name="factura['+i+'][salario]" class="form-control" required /></td>'+
                     '<td><button type="button" class="btn btn-outline-danger remove-input-field">Borrar</button></td>'+
                '</tr>'
                );
            if(i != 0){
                comprobante = document.getElementById('comprobante');
                comprobante.value = null;
                comprobante.style.display = 'none';
                comprobante = document.getElementById('textComprobante');
                comprobante.value = null;
                comprobante.style.display = 'none';   
            }

        });
        $(document).on('click', '.remove-input-field', function () {
            --i;
            $(this).parents('tr').remove();
            if(i == 0){
                comprobante = document.getElementById('comprobante');
                comprobante.style.display = 'block';
                comprobante = document.getElementById('textComprobante');
                comprobante.style.display = 'block';
            }
        });

    function mostrarDiv() {
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