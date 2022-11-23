@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $proveedore->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('razon_social') }}
            {{ Form::text('razon_social', $proveedore->razon_social, ['class' => 'form-control' . ($errors->has('razon_social') ? ' is-invalid' : ''), 'placeholder' => 'Razon Social']) }}
            {!! $errors->first('razon_social', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <?php 
            $estados = [ 
            'Aguascalientes' => 'Aguascalientes',
            'Baja California' => 'Baja California',
            'Baja California Sur' => 'Baja California Sur',
            'Campeche' => 'Campeche',
            'Chiapas' => 'Chiapas',
            'Chihuahua' => 'Chihuahua',
            'Coahuila'  => 'Coahuila' ,
            'Colima' => 'Colima',
            'Distrito Federal' => 'Distrito Federal',
            'Durango' => 'Durango',
            'Guanajuato' => 'Guanajuato',
            'Guerrero' => 'Guerrero',
            'Hidalgo' => 'Hidalgo',
            'Jalisco' => 'Jalisco',
            'México' => 'México',
            'Michoacán' => 'Michoacán',
            'Morelos' => 'Morelos',
            'Nayarit' => 'Nayarit',
            'Nuevo León' => 'Nuevo León',
            'Oaxaca' => 'Oaxaca',
            'Puebla' => 'Puebla',
            'Querétaro' => 'Querétaro',
            'Quintana Roo' => 'Quintana Roo',
            'San Luis Potosí' => 'San Luis Potosí',
            'Sinaloa' => 'Sinaloa',
            'Sonora' => 'Sonora',
            'Tabasco' => 'Tabasco',
            'Tamaulipas' => 'Tamaulipas',
            'Tlaxcala' => 'Tlaxcala',
            'Veracruz' => 'Veracruz',
            'Yucatán' => 'Yucatán',
            'Zacatecas' => 'Zacatecas'];
        ?>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::select('estado', $estados,null ,['class' => 'form-select']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dias_de_credito') }}
            {{ Form::number('dias_de_credito', $proveedore->dias_de_credito, ['class' => 'form-control' . ($errors->has('dias_de_credito') ? ' is-invalid' : ''), 'placeholder' => 'Dias De Credito']) }}
            {!! $errors->first('dias_de_credito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('monto_de_credito') }}
            {{ Form::number('monto_de_credito', $proveedore->monto_de_credito, ['class' => 'form-control' . ($errors->has('monto_de_credito') ? ' is-invalid' : ''), 'placeholder' => 'Monto De Credito','step'=>'any']) }}
            {!! $errors->first('monto_de_credito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group ">
            {{ Form::label('es_facturable') }}
            {{ Form::select('es_facturable', array(
                '0' => 'No',
                '1' => 'Si',
            ),null ,['class' => 'form-select']) }}
            {!! $errors->first('es_facturable', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mail') }}
            {{ Form::email('mail', $proveedore->mail, ['class' => 'form-control' . ($errors->has('mail') ? ' is-invalid' : ''), 'placeholder' => 'Mail']) }}
            {!! $errors->first('mail', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rfc') }}
            {{ Form::text('rfc', $proveedore->rfc, ['class' => 'form-control' . ($errors->has('rfc') ? ' is-invalid' : ''), 'placeholder' => 'Rfc']) }}
            {!! $errors->first('rfc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('es_activo') }}
            {{ Form::text('es_activo', 1, ['class' => 'form-control' . ($errors->has('es_activo') ? ' is-invalid' : ''), 'placeholder' => 'Es Activo']) }}
            {!! $errors->first('es_activo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('usuario_edito') }}
            {{ Form::text('usuario_edito', Auth::user()->name, ['class' => 'form-control' . ($errors->has('usuario_edito') ? ' is-invalid' : '')]) }}
            {!! $errors->first('usuario_edito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <br>
        <a href="{{ route('proveedores.index') }}" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@endif
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#estado').select2();
    </script>
@endpush