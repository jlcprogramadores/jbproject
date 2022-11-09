@if(\Auth::check())
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $cliente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('razon_social') }}
            {{ Form::text('razon_social', $cliente->razon_social, ['class' => 'form-control' . ($errors->has('razon_social') ? ' is-invalid' : ''), 'placeholder' => 'Razon Social']) }}
            {!! $errors->first('razon_social', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mail') }}
            {{ Form::email('mail', $cliente->mail, ['class' => 'form-control' . ($errors->has('mail') ? ' is-invalid' : ''), 'placeholder' => 'Mail']) }}
            {!! $errors->first('mail', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rfc') }}
            {{ Form::text('rfc', $cliente->rfc, ['class' => 'form-control' . ($errors->has('rfc') ? ' is-invalid' : ''), 'placeholder' => 'Rfc']) }}
            {!! $errors->first('rfc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <!-- telefonos dinamicos
            <div class="form-group">
            <table class="table" id="dynamicAddRemove">
                <tr>
                    <th>{{ Form::label('Teléfono(s)') }}</th>
                    <th>Acción</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="addMoreInputFields[0][subject]" placeholder="Ingresa el número" class="form-control"/>
                    </td>
                    <td>
                        <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Agregar el número</button>
                    </td>
                </tr>
            </table>
            {{ Form::text('rfc', $cliente->rfc, ['class' => 'form-control' . ($errors->has('rfc') ? ' is-invalid' : ''), 'placeholder' => 'Rfc']) }}
            {!! $errors->first('rfc', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->
        <div class="form-group d-none">
            {{ Form::label('es_activo') }}
            {{ Form::text('es_activo', 1, ['class' => 'form-control' . ($errors->has('es_activo') ? ' is-invalid' : ''), 'placeholder' => 'Es Activo']) }}
            {!! $errors->first('es_activo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            <input type="text" class= "form-control">
        </div>
    </div>
    <div class="box-footer mt20">
        <br>
        <a href="{{ route('clientes.index') }}" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    // telefonos dinamicos
    // var i = 0;
    // $("#dynamic-ar").click(function () {
    //     ++i;
    //     $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
    //         '][subject]" placeholder="Ingresa el número" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Borrar</button></td></tr>'
    //         );
    // });
    // $(document).on('click', '.remove-input-field', function () {
    //     $(this).parents('tr').remove();
    // });
</script>
@endif