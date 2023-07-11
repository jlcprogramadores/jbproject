
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="col-sm p-1 form-group">
                    {{ Form::label('número_de_proyecto') }}
                    {{ Form::number('numero_de_proyecto', $proyecto->numero_de_proyecto, ['class' => 'form-control' . ($errors->has('numero_de_proyecto') ? ' is-invalid' : ''), 'placeholder' => 'Número De Proyecto']) }}
                    {!! $errors->first('numero_de_proyecto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm p-1 form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $proyecto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm p-1 form-group">
                    {{ Form::label('mina_id', 'Mina') }}
                    {{ Form::select('mina_id',$mina ,$proyecto->mina_id, ['class' => 'form-control' . ($errors->has('mina_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona Mina']) }}
                    {!! $errors->first('mina_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm p-1 form-group">
                    {{ Form::label('presupuesto') }}
                    {{ Form::number('presupuesto', $proyecto->presupuesto, ['class' => 'form-control', 'id' => 'presupuesto' , 'onchange' => "obtenPresupuesto(this.value)" . ($errors->has('presupuesto') ? ' is-invalid' : ''), 'step'=>'any', 'placeholder' => 'Presupuesto']) }}
                    {!! $errors->first('presupuesto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm p-1 form-group">
                    {{ Form::label('margen') }}
                    {{ Form::number('margen', $proyecto->margen, ['class' => 'form-control', 'id' => 'margen' , 'onchange' => "obtenMargen(this.value)" . ($errors->has('margen') ? ' is-invalid' : ''), 'step'=>'any', 'placeholder' => 'Margen']) }}
                    {!! $errors->first('margen', '<div class="invalid-feedback">:message</div>') !!}
                </div>
               
            </div>
            <div class="row">
                <div class="col-sm p-1 form-group">
                    {{ Form::label(__('descripcion')) }}
                    {{ Form::text('descripcion', $proyecto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
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

            <br>
            <div class="row d-flex justify-content-center">
                <a href="{{ route('proyectos.index') }}" class="btn btn-danger col col-sm-2">{{ __('Cancelar')}}</a>    
                <div class="col col-sm-2"></div>
                <button type="submit" id="btn-aceptar" onclick="myFunction();" class="btn btn-primary col col-sm-2">Aceptar</button>
            </div>
        </div>
    </div>
</div>

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