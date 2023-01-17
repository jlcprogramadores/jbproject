<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('nombre', $paro->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('grupo_id','Grupo') }}
            {{ Form::select('grupo_id',$grupo, $paro->grupo_id, ['class' => 'form-control',  ($errors->has('grupo_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el Grupo']) }}
            {!! $errors->first('grupo_id', '<div class="invalid-feedback">Campo requerido *</div>') !!}
        </div>
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
                                <td><input id="empleado_id" type="text" name="empleado[0][empleado_id]" class="form-control ancho-select2" readonly></td>
                                <td><input id="puesto_id" type="text" name="empleado[0][puesto_id]" class="form-control ancho-select2" readonly></td>
                                <td><input id="salario" type="number" min="0" step="any" name="empleado[0][salario]" class="form-control ancho-select2" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('Proyecto') }}
            {{ Form::select('proyecto_id',$proyecto, $paro->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Proyecto']) }}
            {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="p-1 form-group">
            {{ Form::label('fecha_inicio') }}
            {{ Form::date('fecha_inicio', $paro->fecha_inicio, ['class' => 'form-control-sm' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Pago']) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">Campo requerido *</div>') !!}
        </div>
        <div class="p-1 form-group">
            {{ Form::label('fecha_fin') }}
            {{ Form::date('fecha_fin', $paro->fecha_fin, ['class' => 'form-control-sm' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Pago']) }}
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback">Campo requerido *</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comentario') }}
            {{ Form::text('comentario', $paro->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
            {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Edito']) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <br>
        <a href="{{ route('paros.index') }}" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" class="btn btn-primary" onclick="habilitarGrupo()">Aceptar</button>
    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var iteradorTabla = 0;
        var cantidadDeEmpleados = 0;
        $('#grupo_id').select2();
        var mySelect = document.getElementById('grupo_id');
        mySelect.onchange = (event) => {
            var inputText = event.target.value;
            $('#grupo_id').attr('disabled', 'disabled');
            getEmpleadosByGrupo(inputText);
        }

        function getEmpleadosByGrupo(id){

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
            cantidadDeEmpleados = iterable.length;
            for (let indiceEmpleados = 1; indiceEmpleados < cantidadDeEmpleados; indiceEmpleados++) {
                ++iteradorTabla;
                $("#dynamicAddRemove").append(        
                    '<tr>'+
                        '<td><input id="empleado_id'+iteradorTabla+'" type="text" name="empleado['+iteradorTabla+'][empleado_id]" class="form-control ancho-select2" readonly></td>'+
                        '<td><input id="puesto_id'+iteradorTabla+'" type="text" name="empleado['+iteradorTabla+'][puesto_id]" class="form-control ancho-select2" readonly></td>'+
                        '<td><input id="salario_id'+iteradorTabla+'" type="number" step="any" min="0" name="empleado['+iteradorTabla+'][salario_id]" class="form-control ancho-select2" readonly></td>'+
                    '</tr>'
                );
            }

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
                        var elementoEmpleado = element;
                        elementoEmpleado.value = value[0]['nombre'];
                    });

                    var selectPuesto = document.querySelectorAll('[id=puesto_id'+iterador+']');
                    selectPuesto.forEach(function (element) {
                        var elementoEmpleado = element;
                        elementoEmpleado.value = value[0]['puesto'];
                    });

                    var selectSalario = document.querySelectorAll('[id=salario_id'+iterador+']');
                    selectSalario.forEach(function (element) {
                        var elementoEmpleado = element;
                        elementoEmpleado.value = value[0]['salario'];
                    });
                    iterador ++; 
                }
            };
            var apartadoEmpleado = document.getElementById('apartadoEmpleado');
            apartadoEmpleado.style.display = "block";   
            // iteradorTabla = 0;
        }

        function habilitarGrupo() {
            $('#grupo_id').removeAttr('disabled');
        }

    </script>
@endpush