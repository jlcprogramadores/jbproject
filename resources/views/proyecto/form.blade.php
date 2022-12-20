@if(Auth::check() && Auth::user()->es_activo)
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $proyecto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $proyecto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numero_de_proyecto') }}
            {{ Form::number('numero_de_proyecto', $proyecto->numero_de_proyecto, ['class' => 'form-control' . ($errors->has('numero_de_proyecto') ? ' is-invalid' : ''), 'placeholder' => 'Número De Proyecto']) }}
            {!! $errors->first('numero_de_proyecto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('presupuesto') }}
            {{ Form::number('presupuesto', $proyecto->presupuesto, ['class' => 'form-control', 'id' => 'presupuesto' , 'onchange' => "obtenPresupuesto(this.value)" . ($errors->has('presupuesto') ? ' is-invalid' : ''), 'placeholder' => 'Presupuesto']) }}
            {!! $errors->first('presupuesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('margen') }}
            {{ Form::number('margen', $proyecto->margen, ['class' => 'form-control', 'id' => 'margen' , 'onchange' => "obtenMargen(this.value)" . ($errors->has('margen') ? ' is-invalid' : ''), 'placeholder' => 'Margen']) }}
            {!! $errors->first('margen', '<div class="invalid-feedback">:message</div>') !!}
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
        <span id="advertencia" style="color: red" > El Presupuesto debe ser menor al Margen</span>                                
        <br>
        <a href="{{ route('proyectos.index') }}" class="btn btn-danger ">{{ __('Cancelar')}}</a>
        <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary">Aceptar</button>
    </div>
</div>
@endif

<script>
    document.getElementById("advertencia").style.display = "none";
    function obtenPresupuesto(val) {
        var presupuesto = val;
        var margen = document.getElementById('margen');
        if (presupuesto > margen.value) {
            document.getElementById("advertencia").style.display = "block";
            document.getElementById("btn-Aceptar").style.display = "none";
        }else{
            document.getElementById("advertencia").style.display = "none";
            document.getElementById("btn-Aceptar").style.display = "inline-block";
        }
    }

    function obtenMargen(val) {
        var presupuesto = document.getElementById('presupuesto');
        var margen = val;
        if (presupuesto.value > margen) {
            document.getElementById("advertencia").style.display = "block";
            document.getElementById("btn-Aceptar").style.display = "none";
        }else{
            document.getElementById("advertencia").style.display = "none";
            document.getElementById("btn-Aceptar").style.display = "inline-block";
        }
    }

</script>